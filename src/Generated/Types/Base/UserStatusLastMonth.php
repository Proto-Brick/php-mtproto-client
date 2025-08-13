<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/userStatusLastMonth
 */
final class UserStatusLastMonth extends AbstractUserStatus
{
    public const CONSTRUCTOR_ID = 0x65899777;
    
    public string $predicate = 'userStatusLastMonth';
    
    /**
     * @param true|null $byMe
     */
    public function __construct(
        public readonly ?true $byMe = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->byMe) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $byMe = (($flags & (1 << 0)) !== 0) ? true : null;

        return new self(
            $byMe
        );
    }
}