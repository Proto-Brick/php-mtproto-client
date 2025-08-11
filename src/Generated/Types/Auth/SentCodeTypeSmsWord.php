<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeSmsWord
 */
final class SentCodeTypeSmsWord extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xa416ac81;
    
    public string $_ = 'auth.sentCodeTypeSmsWord';
    
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
        if ($this->beginning !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->beginning);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $beginning = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        return new self(
            $beginning
        );
    }
}