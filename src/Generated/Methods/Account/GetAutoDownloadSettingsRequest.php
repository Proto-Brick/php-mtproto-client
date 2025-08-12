<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AutoDownloadSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getAutoDownloadSettings
 */
final class GetAutoDownloadSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x56da0b3f;
    
    public string $predicate = 'account.getAutoDownloadSettings';
    
    public function getMethodName(): string
    {
        return 'account.getAutoDownloadSettings';
    }
    
    public function getResponseClass(): string
    {
        return AutoDownloadSettings::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}