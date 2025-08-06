<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Account\PasswordInputSettings;
use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractAuthorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.recoverPassword
 */
final class RecoverPasswordRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x37096c70;
    
    public string $_ = 'auth.recoverPassword';
    
    public function getMethodName(): string
    {
        return 'auth.recoverPassword';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param string $code
     * @param PasswordInputSettings|null $newSettings
     */
    public function __construct(
        public readonly string $code,
        public readonly ?PasswordInputSettings $newSettings = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->newSettings !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->code);
        if ($flags & (1 << 0)) {
            $buffer .= $this->newSettings->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}