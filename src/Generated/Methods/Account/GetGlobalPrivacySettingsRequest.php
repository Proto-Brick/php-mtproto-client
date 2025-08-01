<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractGlobalPrivacySettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getGlobalPrivacySettings
 */
final class GetGlobalPrivacySettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3945483510;
    
    public string $_ = 'account.getGlobalPrivacySettings';
    
    public function getMethodName(): string
    {
        return 'account.getGlobalPrivacySettings';
    }
    
    public function getResponseClass(): string
    {
        return AbstractGlobalPrivacySettings::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}