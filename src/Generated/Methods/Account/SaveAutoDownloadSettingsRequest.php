<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractAutoDownloadSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveAutoDownloadSettings
 */
final class SaveAutoDownloadSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1995661875;
    
    public string $_ = 'account.saveAutoDownloadSettings';
    
    public function getMethodName(): string
    {
        return 'account.saveAutoDownloadSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractAutoDownloadSettings $settings
     * @param bool|null $low
     * @param bool|null $high
     */
    public function __construct(
        public readonly AbstractAutoDownloadSettings $settings,
        public readonly ?bool $low = null,
        public readonly ?bool $high = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->low) $flags |= (1 << 0);
        if ($this->high) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->settings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}