<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\ContentSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getContentSettings
 */
final class GetContentSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8b9b4dae;
    
    public string $predicate = 'account.getContentSettings';
    
    public function getMethodName(): string
    {
        return 'account.getContentSettings';
    }
    
    public function getResponseClass(): string
    {
        return ContentSettings::class;
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