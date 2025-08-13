<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeSms
 */
final class SentCodeTypeSms extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xc000bba2;
    
    public string $predicate = 'auth.sentCodeTypeSms';
    
    /**
     * @param int $length
     */
    public function __construct(
        public readonly int $length
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $length = Deserializer::int32($stream);

        return new self(
            $length
        );
    }
}