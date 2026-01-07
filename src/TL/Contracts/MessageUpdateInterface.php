<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\Contracts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessage;

interface MessageUpdateInterface
{
    public function toFullMessage(int $selfId): AbstractMessage;
    public function isEdit(): bool;
}