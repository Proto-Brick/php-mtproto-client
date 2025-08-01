<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.loggedOut
 */
final class LoggedOut extends AbstractLoggedOut
{
    public const CONSTRUCTOR_ID = 3282207583;
    
    public string $_ = 'auth.loggedOut';
    
    /**
     * @param string|null $futureAuthToken
     */
    public function __construct(
        public readonly ?string $futureAuthToken = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->futureAuthToken !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->futureAuthToken);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $futureAuthToken = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
            return new self(
            $futureAuthToken
        );
    }
}