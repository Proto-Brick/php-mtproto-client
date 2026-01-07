<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/userStatusOffline
 */
final class UserStatusOffline extends AbstractUserStatus
{
    public const CONSTRUCTOR_ID = 0x8c703f;
    
    public string $predicate = 'userStatusOffline';
    
    /**
     * @param int $wasOnline
     */
    public function __construct(
        public readonly int $wasOnline
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->wasOnline);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $wasOnline = Deserializer::int32($__payload, $__offset);

        return new self(
            $wasOnline
        );
    }
}