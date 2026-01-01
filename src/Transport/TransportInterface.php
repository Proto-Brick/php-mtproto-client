<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport;

use Amp\Future;

interface TransportInterface
{
    public function connect(): Future;
    /**
     * @param string $payload Тело пакета (уже зашифрованное, если это MTProto)
     * @param bool $isHeader Если true, отправляется рукопожатие протокола
     */
    public function send(string $payload, bool $isHeader = false): Future;

    /**
     * @param int $length Сколько байт читать (или 4 для чтения длины)
     */
    public function receive(int $length): Future;

    public function close(): void;

    public function isConnected(): bool;
}