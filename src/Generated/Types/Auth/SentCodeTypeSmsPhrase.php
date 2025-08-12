<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeSmsPhrase
 */
final class SentCodeTypeSmsPhrase extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xb37794af;
    
    public string $predicate = 'auth.sentCodeTypeSmsPhrase';
    
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
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $beginning = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;

        return new self(
            $beginning
        );
    }
}