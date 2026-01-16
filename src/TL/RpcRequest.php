<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL;

use ProtoBrick\MTProtoClient\TL\Contracts\RequestInterface;
use ProtoBrick\MTProtoClient\TL\Contracts\Serializable;
use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;

/**
 * Abstract base class for all generated RPC Request classes.
 * These objects are serializable but not deserializable.
 * @template TResponse
 */
abstract class RpcRequest implements TlObjectInterface, Serializable, RequestInterface
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
    abstract public function getMethodName(): string;
    abstract public function getResponseClass(): string;
}