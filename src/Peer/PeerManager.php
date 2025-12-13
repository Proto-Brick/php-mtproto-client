<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Peer;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Peer\Storage\PeerStorage;

class PeerManager
{
    private ?Client $client = null;

    public function __construct(
        private readonly PeerStorage $storage
    ) {
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * Превращает ID (int) или Username (string) в InputPeer.
     * Если передан уже InputPeer, возвращает его как есть.
     */
    public function resolve(mixed $peer): AbstractInputPeer
    {
        if ($peer instanceof AbstractInputPeer) {
            return $peer;
        }

        if ($peer === 0 || $peer === '0') {
            return new InputPeerEmpty();
        }

        $info = null;

        // 1. Поиск по ID
        if (is_int($peer)) {
            $info = $this->storage->getById($peer);
        } // 2. Поиск по Username
        elseif (is_string($peer)) {
            $username = ltrim($peer, '@');
            $info = $this->storage->getByUsername($username);

            // Если нет в кеше, пробуем резолвить через сеть
            if (!$info && $this->client) {
                try {
                    // Этот вызов вернет contacts.ResolvedPeer
                    // Внутри Client сработает collect(), и пир попадет в сторадж
                    $this->client->contacts->resolveUsername($username);
                    $info = $this->storage->getByUsername($username);
                } catch (\Throwable $e) {

                }
            }
        }

        if (!$info) {
            $type = gettype($peer);
            $value = (string)$peer;

            $message = "Could not resolve peer '{$value}' ({$type}).";

            if (is_int($peer)) {
                $message .= "\nPossible reasons:\n";
                $message .= "1. This ID is not in the local cache ('peers.json').\n";
                $message .= "2. You haven't met this user/chat yet. Telegram requires an 'access_hash' to interact with IDs.\n";
                $message .= "Solutions:\n";
                $message .= " - Use a @username (string) instead. The library can resolve usernames automatically via API.\n";
                $message .= " - Fetch updates or dialogs first (e.g. call \$client->messages->getDialogs()) to populate the cache.\n";
                $message .= " - If you know the access_hash, pass 'new InputPeerUser(id, access_hash)' manually.\n";
            } elseif (is_string($peer)) {
                $message .= "\nReason: Username not found in cache and API resolution (contacts.resolveUsername) failed or returned empty result.\n";
                $message .= "Check if the username is correct and the entity exists.\n";
            }

            throw new \InvalidArgumentException($message);
        }

        // 3. Формирование InputPeer из PeerInfo
        return match ($info->type) {
            'user' => new InputPeerUser($info->id, $info->accessHash),
            'channel' => new InputPeerChannel($info->id, $info->accessHash),
            'chat' => new InputPeerChat($info->id),
            default => throw new \RuntimeException("Unknown peer type in storage"),
        };
    }

    /**
     * "Пылесос": рекурсивно ищет Users/Chats в ответе и сохраняет их.
     */
    public function collect(mixed $object): void
    {
        if (is_array($object)) {
            foreach ($object as $item) {
                $this->collect($item);
            }
            return;
        }

        if (!is_object($object)) {
            return;
        }

        // Определяем тип по имени класса
        $class = get_class($object);

        // Быстрая проверка на наличие ID
        if (!property_exists($object, 'id')) {
            $this->scanProperties($object);
            return;
        }

        $id = $object->id;
        $type = null;

        // Эвристика определения типа
        if (str_contains($class, 'User') && !str_contains($class, 'Empty')) {
            $type = 'user';
        } elseif (str_contains($class, 'Channel') && !str_contains($class, 'Forbidden')) {
            $type = 'channel';
        } elseif (str_contains($class, 'Chat') && !str_contains($class, 'Empty') && !str_contains($class, 'Channel')) {
            $type = 'chat';
        }

        if ($type) {
            $this->storage->save(
                new PeerInfo(
                    id: (int)$id,
                    accessHash: (int)($object->accessHash ?? 0),
                    type: $type,
                    username: $object->username ?? null,
                    phone: $object->phone ?? null
                )
            );
        }

        $this->scanProperties($object);
    }

    private function scanProperties(object $object): void
    {
        foreach (get_object_vars($object) as $prop) {
            $this->collect($prop);
        }
    }
}