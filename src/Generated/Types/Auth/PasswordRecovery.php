<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.passwordRecovery
 */
final class PasswordRecovery extends AbstractPasswordRecovery
{
    public const CONSTRUCTOR_ID = 326715557;
    
    public string $_ = 'auth.passwordRecovery';
    
    /**
     * @param string $emailPattern
     */
    public function __construct(
        public readonly string $emailPattern
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->emailPattern);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $emailPattern = $deserializer->bytes($stream);
            return new self(
            $emailPattern
        );
    }
}