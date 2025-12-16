<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeMissedCall
 */
final class SentCodeTypeMissedCall extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0x82006484;
    
    public string $predicate = 'auth.sentCodeTypeMissedCall';
    
    /**
     * @param string $prefix
     * @param int $length
     */
    public function __construct(
        public readonly string $prefix,
        public readonly int $length
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->prefix);
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prefix = Deserializer::bytes($stream);
        $length = Deserializer::int32($stream);

        return new self(
            $prefix,
            $length
        );
    }
}