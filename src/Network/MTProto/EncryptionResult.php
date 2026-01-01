<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network\MTProto;
readonly class EncryptionResult {
    public function __construct(
        public string $payload,
        public int $msgId,
        public int $seqNo,
        public float $timeMs
    ) {}
}