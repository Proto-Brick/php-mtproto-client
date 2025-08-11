<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\GlobalPrivacySettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.setGlobalPrivacySettings
 */
final class SetGlobalPrivacySettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1edaaac2;
    
    public string $_ = 'account.setGlobalPrivacySettings';
    
    public function getMethodName(): string
    {
        return 'account.setGlobalPrivacySettings';
    }
    
    public function getResponseClass(): string
    {
        return GlobalPrivacySettings::class;
    }
    /**
     * @param GlobalPrivacySettings $settings
     */
    public function __construct(
        public readonly GlobalPrivacySettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}