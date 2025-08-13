<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/securePlainPhone
 */
final class SecurePlainPhone extends AbstractSecurePlainData
{
    public const CONSTRUCTOR_ID = 0x7d6099dd;
    
    public string $predicate = 'securePlainPhone';
    
    /**
     * @param string $phone
     */
    public function __construct(
        public readonly string $phone
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phone);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $phone = Deserializer::bytes($stream);

        return new self(
            $phone
        );
    }
}