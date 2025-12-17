<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\Contracts;

/**
 * Interface for objects that can be deserialized from a TL binary string.
 */
interface Deserializable
{
    /**
     * Deserializes an object from a binary stream using an offset.
     *
     * @param string $__payload The full binary data.
     * @param int    $__offset  Current read position (passed by reference).
     * @return static
     */
    public static function deserialize(string $__payload, int &$__offset): static;
}