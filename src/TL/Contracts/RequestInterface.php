<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\Contracts;

/**
 * Interface for RPC method calls.
 */
interface RequestInterface
{
    /**
     * Returns the name of the RPC method as defined in the TL schema.
     */
    public function getMethodName(): string;

    /**
     * Returns the expected response type.
     * This can be a fully-qualified class name (::class),
     * a special 'vector<...>' type string,
     * or a basic PHP primitive type name (e.g., 'int', 'bool').
     */
    public function getResponseClass(): string;
}