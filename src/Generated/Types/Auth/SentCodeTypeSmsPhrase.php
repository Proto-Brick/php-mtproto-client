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
    public const CONSTRUCTOR_ID = 3010958511;
    
    public string $_ = 'auth.sentCodeTypeSmsPhrase';
    
    /**
     * @param string|null $beginning
     */
    public function __construct(
        public readonly ?string $beginning = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->beginning !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->beginning);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $beginning = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
            return new self(
            $beginning
        );
    }
}