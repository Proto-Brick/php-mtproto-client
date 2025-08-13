<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeSmsWord
 */
final class SentCodeTypeSmsWord extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xa416ac81;
    
    public string $predicate = 'auth.sentCodeTypeSmsWord';
    
    /**
     * @param string|null $beginning
     */
    public function __construct(
        public readonly ?string $beginning = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->beginning !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->beginning);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $beginning = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;

        return new self(
            $beginning
        );
    }
}