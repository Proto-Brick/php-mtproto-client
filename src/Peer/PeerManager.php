<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Peer;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\PeerCollector;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Peer\Storage\PeerStorage;
use ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity;

class PeerManager
{
    private ?Client $client = null;

    private PeerCollector $collector;

    public function __construct(
        private readonly PeerStorage $storage
    ) {
        // Инициализируем сгенерированный коллектор
        $this->collector = new PeerCollector();
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
                    // Игнорируем ошибки резолвинга
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
     * "Пылесос" (Ultimate Edition): Делегирует работу сгенерированному коду.
     */
    public function collect(mixed $object): void
    {
        // 1. Проверка корневого объекта (для одиночных вызовов или "листьев" дерева)
        if ($object instanceof PeerEntity) {
            $this->savePeerEntity($object);
            return;
        }

        // 2. Обработка списков (Vector<T>)
        if (is_array($object)) {
            foreach ($object as $item) {
                $this->collect($item);
            }
            return;
        }

        if (!is_object($object)) {
            return;
        }

        // 3. Прямой вызов сгенерированного кода
        // PeerCollector содержит switch ($object::class), который работает за O(1).
        // Он сам знает, какие свойства сканировать (рекурсия через $this->collect),
        // а какие сохранять (через $this->savePeerEntity).
        $this->collector->collect($object, $this);
    }

    /**
     * PUBLIC метод (вызывается из PeerCollector).
     * Сохраняет сущность в хранилище.
     */
    public function savePeerEntity(PeerEntity $object): void
    {
        // Проверка на наличие ID
        if (!isset($object->id)) {
            return;
        }

        $id = (int) $object->id;
        $accessHash = isset($object->accessHash) ? (int) $object->accessHash : 0;

        $type = $object->getPeerType();

        $isMin = false;
        if (property_exists($object, 'min') && $object->min === true) {
            $isMin = true;
        }

        $this->storage->save(
            new PeerInfo(
                id: $id,
                accessHash: $accessHash,
                type: $type,
                username: $object->username ?? null,
                phone: $object->phone ?? null,
                isMin: $isMin
            )
        );
    }
}