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
use ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity;

class PeerManager
{
    private ?Client $client = null;

    /**
     * @var array<string, array<string, int>> Карта свойств: [ClassName => [propName => ActionID]]
     */
    private static array $propertyMap = [];

    private const ACTION_SCAN = 1;
    private const ACTION_SAVE = 2;

    public function __construct(
        private readonly PeerStorage $storage
    ) {
        if (empty(self::$propertyMap)) {
            $mapPath = __DIR__ . '/../Generated/PeerPropertyMap.php';
            if (file_exists($mapPath)) {
                self::$propertyMap = require $mapPath;
            }
        }
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
                    // Игнорируем ошибки резолвинга, чтобы выбросить общее исключение ниже
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
                $message .= " - Fetch updates or dialogs first (e.g. call \$client->messages->getDialogs(...)) to populate the cache.\n";
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
     * "Пылесос": ищет сущности в ответе API согласно карте PeerPropertyMap.
     */
    public function collect(mixed $object): void
    {
        // 1. Проверка корневого объекта (на случай, если collect вызван вручную для User)
        if ($object instanceof PeerEntity) {
            $this->savePeerEntity($object);
            return; // Сущности в Telegram - это "листья", внутри них нет других сущностей
        }

        if (is_array($object)) {
            foreach ($object as $item) {
                $this->collect($item);
            }
            return;
        }

        if (!is_object($object)) {
            return;
        }

        $class = get_class($object);

        // Если для класса нет карты, значит в нем нет ничего интересного (спасибо генератору)
        if (!isset(self::$propertyMap[$class])) {
            return;
        }

        // 2. Работа по карте
        foreach (self::$propertyMap[$class] as $prop => $action) {
            // Быстрый доступ к свойству (они public readonly)
            if (!isset($object->$prop)) {
                continue;
            }
            $value = $object->$prop;

            // Внимание: $value может быть массивом (если это Vector<Type>)
            // или null (если поле опциональное)
            if ($value === null) {
                continue;
            }

            if ($action === self::ACTION_SAVE) {
                // Это либо Entity, либо массив Entity.
                if (is_array($value)) {
                    foreach ($value as $item) {
                        if ($item instanceof PeerEntity) {
                            $this->savePeerEntity($item);
                        }
                    }
                } elseif ($value instanceof PeerEntity) {
                    $this->savePeerEntity($value);
                }
            } elseif ($action === self::ACTION_SCAN) {
                // Это контейнер (Dialogs, Updates...). Идем вглубь.
                if (is_array($value)) {
                    foreach ($value as $item) {
                        $this->collect($item);
                    }
                } else {
                    $this->collect($value);
                }
            }
        }
    }

    /**
     * Извлекает данные из PeerEntity и сохраняет в хранилище.
     */
    private function savePeerEntity(PeerEntity $object): void
    {
        // Проверка на наличие ID (хотя интерфейс и генератор это гарантируют)
        if (!isset($object->id)) {
            return;
        }

        $id = (int)$object->id;
        // У обычных чатов (Chat) нет access_hash, ставим 0
        $accessHash = isset($object->accessHash) ? (int)$object->accessHash : 0;

        $class = get_class($object);
        $type = 'user'; // default

        // Определение типа по имени класса (быстро и надежно для сгенерированных классов)
        if (str_contains($class, 'Channel')) {
            $type = 'channel';
        } elseif (str_contains($class, 'Chat')) {
            $type = 'chat';
        }

        $this->storage->save(
            new PeerInfo(
                id: $id,
                accessHash: $accessHash,
                type: $type,
                username: $object->username ?? null,
                phone: $object->phone ?? null
            )
        );
    }
}