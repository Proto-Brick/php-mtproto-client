<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Session;

use DigitalStars\MtprotoClient\Auth\AuthKey;
use DigitalStars\MtprotoClient\Session\Storage\SessionStorage;

class Session
{
    private ?string $id = null;
    private int $sequence = 0;
    private ?int $serverSalt = null;

    private int $timeOffset = 0;

    private int $msgIdCounter = 0;

    public bool $isInitialized = false;

    /** @var array<int, true> Очередь msg_id для отправки в msgs_ack. Используем ключи для уникальности. */
    private array $ackQueue = [];

    public function __construct(private readonly SessionStorage $storage) {}

    public function start(AuthKey $authKey): void
    {
        if ($this->serverSalt !== null) {
            echo "[SESSION] Starting with pre-set salt. Skipping load from storage.\n";
            if ($this->id === null) {
                $this->id = random_bytes(8);
            }
            $this->isInitialized = false;
            return;
        }

        $data = $this->storage->getFor($authKey->id);
        if ($data && isset($data['id'])) {
            $this->id = $data['id'];
            $this->sequence = $data['sequence'] ?? 0;
            $this->serverSalt = $data['salt'] ?? null;
            $this->timeOffset = $data['time_offset'] ?? 0;
            $this->isInitialized = false;
            $this->msgIdCounter = 0;
        } else {
            $this->reset();
        }
    }

    public function reset(): void
    {
        echo "[SESSION] Resetting session state completely.\n";
        $this->id = random_bytes(8);
        $this->sequence = 0;
        $this->msgIdCounter = 0;
        $this->isInitialized = false;
        // serverSalt и timeOffset будут получены от сервера заново
        $this->serverSalt = null;
        $this->timeOffset = 0;
    }


    public function save(AuthKey $authKey): void
    {
        // Убедимся, что ID сессии и salt не null перед сохранением
        if ($this->id === null || $this->serverSalt === null) {
            // Можно либо бросить исключение, либо просто не сохранять неполную сессию
            // echo "Warning: Attempted to save an incomplete session.\n";
            return;
        }

        //print 'Соль сохраняем: ' . $this->serverSalt . PHP_EOL;

        $this->storage->setFor($authKey->id, [
            'id' => $this->id,
            'sequence' => $this->sequence,
            'salt' => $this->serverSalt, // Эта строка у вас уже есть, она правильная
            'time_offset' => $this->timeOffset,     // <-- ДОБАВЬТЕ ЭТО ПОЛЕ
        ]);
    }

    public function addToAckQueue(int $msgId): void
    {
        $this->ackQueue[$msgId] = true;
    }

    public function getAndClearAckQueue(): array
    {
        if (empty($this->ackQueue)) {
            return [];
        }
        // array_keys вернет все msg_id, которые мы накопили.
        $queue = array_keys($this->ackQueue);
        $this->ackQueue = [];
        return $queue;
    }

    public function setTimeOffset(int $offset): void
    {
        if ($this->timeOffset !== $offset) {
            $this->timeOffset = $offset;
        }
    }

    public function incrementSequence(): void
    {
        $this->sequence++;
    }

    public function resetSequence(): void
    {
        $this->sequence = 0;
    }

    public function generateMessageId(): int
    {
        // Применяем смещение времени для синхронизации с сервером
        $time = microtime(true) + $this->timeOffset;

        $sec = (int) $time;
        // Используем 20 бит для микросекунд, чтобы осталось место для счетчика
        $usec = (int) (($time - $sec) * (2 ** 20));

        // 64-битное число:
        // [ 32 бита: секунды ] [ 20 бит: микросекунды ] [ 10 бит: счетчик ] [ 2 бита: 00 ]
        $msgId = ($sec << 32) | ($usec << 12) | ($this->msgIdCounter << 2);

        // Убеждаемся, что msg_id делится на 4
        // (хотя сдвиг << 2 это уже гарантирует, это для надежности)
        if ($msgId % 4 !== 0) {
            $msgId += 4 - ($msgId % 4);
        }

        // Увеличиваем счетчик для следующего вызова
        $this->msgIdCounter++;

        // 'q' - 64-bit signed little-endian
        return $msgId;
    }

    public function generateSequence(bool $isContentRelated): int
    {
        if ($isContentRelated) {
            $seq = $this->sequence * 2 + 1;
            $this->sequence++;
            return $seq;
        }
        return $this->sequence * 2;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
    public function getServerSalt(): ?int
    {
        return $this->serverSalt;
    }
    public function setServerSalt(int $salt): void
    {
        $this->serverSalt = $salt;
    }
}
