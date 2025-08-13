<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\Contracts;

/**
 * The base interface for any TL-schema defined object (constructors and methods).
 */
interface TlObjectInterface
{
    /**
     * Returns the 32-bit constructor ID of the object.
     */
    public function getConstructorId(): int;

    /**
     * Returns the predicate string of the object (e.g., "user" or "messages.sendMessage").
     */
    public function getPredicate(): string;
}