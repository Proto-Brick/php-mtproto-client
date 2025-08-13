<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\Contracts;

/**
 * Interface for objects that can be deserialized from a TL binary string.
 */
interface Deserializable
{
    /**
     * Deserializes an object from a binary stream.
     * The stream is passed by reference and should be advanced by the method.
     *
     * @param string $stream
     * @return static
     */
    public static function deserialize(string &$stream): static;
}