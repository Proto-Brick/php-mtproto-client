<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Peer;

/**
 * Неизменяемый объект, хранящий минимально необходимые данные для обращения к пиру.
 */
final readonly class PeerInfo
{
    public function __construct(
        public int $id,
        public int $accessHash, // 0 означает отсутствие хеша
        public string $type,    // 'user', 'chat', 'channel'
        public ?string $username = null,
        public ?string $phone = null,
    ) {}
}