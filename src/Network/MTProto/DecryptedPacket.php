<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network\MTProto;
readonly class DecryptedPacket {
    public function __construct(
        public int $msgId,
        public int $seqNo,
        public string $body,
        public float $timeMs
    ) {}
}