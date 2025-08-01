<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeSetUpEmailRequired
 */
final class SentCodeTypeSetUpEmailRequired extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 2773032426;
    
    public string $_ = 'auth.sentCodeTypeSetUpEmailRequired';
    
    /**
     * @param bool|null $appleSigninAllowed
     * @param bool|null $googleSigninAllowed
     */
    public function __construct(
        public readonly ?bool $appleSigninAllowed = null,
        public readonly ?bool $googleSigninAllowed = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->appleSigninAllowed) $flags |= (1 << 0);
        if ($this->googleSigninAllowed) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $appleSigninAllowed = ($flags & (1 << 0)) ? true : null;
        $googleSigninAllowed = ($flags & (1 << 1)) ? true : null;
            return new self(
            $appleSigninAllowed,
            $googleSigninAllowed
        );
    }
}