<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeFragmentSms
 */
final class SentCodeTypeFragmentSms extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xd9565c39;
    
    public string $predicate = 'auth.sentCodeTypeFragmentSms';
    
    /**
     * @param string $url
     * @param int $length
     */
    public function __construct(
        public readonly string $url,
        public readonly int $length
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $url = Deserializer::bytes($stream);
        $length = Deserializer::int32($stream);

        return new self(
            $url,
            $length
        );
    }
}