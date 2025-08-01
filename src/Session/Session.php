<?php declare(strict_types=1);
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

    public bool $isInitialized = false; // <-- ДОБАВЬТЕ ЭТО СВОЙСТВО

    public function __construct(private readonly SessionStorage $storage) {}

    public function start(AuthKey $authKey): void
    {
        $data = $this->storage->getFor($authKey->id);
        if ($data) {
            $this->id = $data['id'] ?? null;
            $this->sequence = $data['sequence'] ?? 0;
            $this->serverSalt = $data['salt'] ?? null;
            $this->isInitialized = false;
            $this->timeOffset = $data['time_offset'] ?? 0;
            $this->msgIdCounter = 0;
            if ($this->id === null) {
                $this->id = random_bytes(8);
            }
        } else {
            $this->id = random_bytes(8);
            $this->sequence = 0;
        }
    }


    public function save(AuthKey $authKey): void
    {
        // Убедимся, что ID сессии и salt не null перед сохранением
        if ($this->id === null || $this->serverSalt === null) {
            // Можно либо бросить исключение, либо просто не сохранять неполную сессию
            // echo "Warning: Attempted to save an incomplete session.\n";
            return;
        }

        print 'Соль сохраняем: '.$this->serverSalt.PHP_EOL;

        $this->storage->setFor($authKey->id, [
            'id' => $this->id,
            'sequence' => $this->sequence,
            'salt' => $this->serverSalt, // Эта строка у вас уже есть, она правильная
            'time_offset' => $this->timeOffset,     // <-- ДОБАВЬТЕ ЭТО ПОЛЕ
        ]);
    }

    public function setTimeOffset(int $offset): void
    {
        if ($this->timeOffset !== $offset) {
            $this->timeOffset = $offset;
            echo "INFO: Time offset updated to {$this->timeOffset} seconds.\n";
        }
    }

    public function resetSequence(): void
    {
        $this->sequence = 0;
    }

    public function generateMessageId(): int
    {
        // Применяем смещение времени для синхронизации с сервером
        $time = microtime(true) + $this->timeOffset;

        $sec = (int)$time;
        // Используем 20 бит для микросекунд, чтобы осталось место для счетчика
        $usec = (int)(($time - $sec) * (2**20));

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

    public function getId(): ?string { return $this->id; }
    public function getServerSalt(): ?int { return $this->serverSalt; }
    public function setServerSalt(int $salt): void { $this->serverSalt = $salt; }
}