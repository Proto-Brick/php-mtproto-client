<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractAutoDownloadSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getAutoDownloadSettings
 */
final class GetAutoDownloadSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1457130303;
    
    public string $_ = 'account.getAutoDownloadSettings';
    
    public function getMethodName(): string
    {
        return 'account.getAutoDownloadSettings';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAutoDownloadSettings::class;
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