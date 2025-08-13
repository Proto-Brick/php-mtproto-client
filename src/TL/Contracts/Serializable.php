<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\Contracts;

/**
 * Interface for objects that can be serialized into a TL binary string.
 */
interface Serializable
{
    /**
     * Serializes the object into a binary string.
     */
    public function serialize(): string;
}