<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network\MTProto;

class SessionState
{
    private string $sessionId;
    private int $seqNo = 0;
    private int $serverSalt = 0;
    private int $lastMessageId = 0;
    private int $timeOffset = 0;

    private bool $isInitialized = false;

    /** @var array<int, true> Очередь msg_id для отправки в msgs_ack */
    private array $ackQueue = [];

    public function __construct()
    {
        // Session ID is generated once and persists for the session lifetime
        $this->sessionId = random_bytes(8);
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * Generates a unique, monotonically increasing 64-bit message ID.
     * Based on client time + server offset.
     */
    public function generateMessageId(): int
    {
        $time = microtime(true) + $this->timeOffset;
        $sec = (int) $time;
        $usec = (int) (($time - $sec) * 1000000);

        // Structure: [unix timestamp][microseconds][padding]
        // Must be divisible by 4
        $val = ($sec << 32) | ($usec << 12);

        // Ensure uniqueness and monotonicity
        while ($val <= $this->lastMessageId) {
            $val += 4;
        }

        $this->lastMessageId = $val;
        return $val;
    }

    /**
     * Generates the sequence number for the message.
     * Content-related messages increment the seqno.
     */
    public function generateSeqNo(bool $contentRelated): int
    {
        if ($contentRelated) {
            $seq = $this->seqNo * 2 + 1;
            $this->seqNo++;
            return $seq;
        }
        return $this->seqNo * 2;
    }

    public function setServerSalt(int $salt): void
    {
        $this->serverSalt = $salt;
    }

    public function getServerSalt(): int
    {
        return $this->serverSalt;
    }

    public function setTimeOffset(int $offset): void
    {
        $this->timeOffset = $offset;
    }

    public function isInitialized(): bool
    {
        return $this->isInitialized;
    }

    public function setInitialized(bool $val): void
    {
        $this->isInitialized = $val;
    }

    public function updateTimeOffset(int $serverMsgId): void
    {
        $serverTime = $serverMsgId >> 32;
        $localTime = time();
        $diff = $serverTime - $localTime;

        $this->timeOffset = $diff;
        $this->lastMessageId = 0;
    }

    /**
     * Экспорт состояния для сохранения на диск
     */
    public function toArray(): array
    {
        return [
            'session_id'  => bin2hex($this->sessionId),
//            'seq_no'      => $this->seqNo,
            'salt'        => $this->serverSalt,
            'time_offset' => $this->timeOffset,
        ];
    }

    /**
     * Восстановление состояния с диска
     */
    public function fromArray(array $data): void
    {
//        if (isset($data['session_id'])) {
//            $this->sessionId = hex2bin($data['session_id']);
//        }
//        if (isset($data['seq_no'])) {
//            $this->seqNo = (int)$data['seq_no'];
//        }
        if (isset($data['salt'])) {
            $this->serverSalt = (int)$data['salt'];
        }
        if (isset($data['time_offset'])) {
            $this->timeOffset = (int)$data['time_offset'];
        }

        // Если данные загружены, считаем сессию инициализированной
        // (хотя сервер может думать иначе, bad_server_salt/bad_notification поправит это)
        $this->isInitialized = false;
    }

    public function resetSeqNo(): void
    {
        $this->seqNo = 0;
    }

    public function addToAckQueue(int $msgId): void
    {
        $this->ackQueue[$msgId] = true;
    }

    /**
     * Возвращает список ID сообщений для подтверждения и очищает очередь.
     * @return int[]
     */
    public function getAndClearAckQueue(): array
    {
        if (empty($this->ackQueue)) {
            return [];
        }
        $ids = array_keys($this->ackQueue);
        $this->ackQueue = [];
        return $ids;
    }
}