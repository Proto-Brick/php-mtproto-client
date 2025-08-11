<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\PasswordInputSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updatePasswordSettings
 */
final class UpdatePasswordSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa59b102f;
    
    public string $_ = 'account.updatePasswordSettings';
    
    public function getMethodName(): string
    {
        return 'account.updatePasswordSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputCheckPasswordSRP $password
     * @param PasswordInputSettings $newSettings
     */
    public function __construct(
        public readonly AbstractInputCheckPasswordSRP $password,
        public readonly PasswordInputSettings $newSettings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->password->serialize();
        $buffer .= $this->newSettings->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}