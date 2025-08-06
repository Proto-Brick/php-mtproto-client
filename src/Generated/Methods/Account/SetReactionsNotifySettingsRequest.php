<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionsNotifySettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.setReactionsNotifySettings
 */
final class SetReactionsNotifySettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x316ce548;
    
    public string $_ = 'account.setReactionsNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.setReactionsNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return ReactionsNotifySettings::class;
    }
    /**
     * @param ReactionsNotifySettings $settings
     */
    public function __construct(
        public readonly ReactionsNotifySettings $settings
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->settings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}