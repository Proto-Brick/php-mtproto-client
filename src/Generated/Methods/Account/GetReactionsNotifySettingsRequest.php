<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionsNotifySettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getReactionsNotifySettings
 */
final class GetReactionsNotifySettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6dd654c;
    
    public string $_ = 'account.getReactionsNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.getReactionsNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return ReactionsNotifySettings::class;
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