<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\PasswordSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getPasswordSettings
 */
final class GetPasswordSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9cd4eaf9;
    
    public string $_ = 'account.getPasswordSettings';
    
    public function getMethodName(): string
    {
        return 'account.getPasswordSettings';
    }
    
    public function getResponseClass(): string
    {
        return PasswordSettings::class;
    }
    /**
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->password->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}