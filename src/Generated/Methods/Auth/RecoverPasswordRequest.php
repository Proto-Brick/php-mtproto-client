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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->newSettings !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->code);
        if ($flags & (1 << 0)) {
            $buffer .= $this->newSettings->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}