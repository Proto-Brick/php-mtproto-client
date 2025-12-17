<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL;

use ProtoBrick\MTProtoClient\TL\Contracts\Deserializable;
use ProtoBrick\MTProtoClient\TL\Contracts\Serializable;
use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;

/**
 * Abstract base class for all generated DTO (Type) classes.
 * These objects are both serializable and deserializable.
 */
abstract class TlObject implements TlObjectInterface, Serializable, Deserializable
{
    /**
     * Must be defined in generated classes.
     * @var int
     */
    public const CONSTRUCTOR_ID = 0;

    /**
     * Must be defined in generated classes.
     * @var string
     */
    public string $predicate = '';

    public function getConstructorId(): int
    {
        return static::CONSTRUCTOR_ID;
    }

    public function getPredicate(): string
    {
        return $this->predicate;
    }

    // These methods must be implemented by the generated classes.
    abstract public function serialize(): string;

    /**
     * @param string $payload
     * @param int $offset
     * @return static
     */
    abstract public static function deserialize(string $__payload, int &$__offset): static;
}