<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractAutoDownloadSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.autoDownloadSettings
 */
final class AutoDownloadSettings extends AbstractAutoDownloadSettings
{
    public const CONSTRUCTOR_ID = 1674235686;
    
    public string $_ = 'account.autoDownloadSettings';
    
    /**
     * @param AbstractAutoDownloadSettings $low
     * @param AbstractAutoDownloadSettings $medium
     * @param AbstractAutoDownloadSettings $high
     */
    public function __construct(
        public readonly AbstractAutoDownloadSettings $low,
        public readonly AbstractAutoDownloadSettings $medium,
        public readonly AbstractAutoDownloadSettings $high
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->low->serialize($serializer);
        $buffer .= $this->medium->serialize($serializer);
        $buffer .= $this->high->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $low = AbstractAutoDownloadSettings::deserialize($deserializer, $stream);
        $medium = AbstractAutoDownloadSettings::deserialize($deserializer, $stream);
        $high = AbstractAutoDownloadSettings::deserialize($deserializer, $stream);
            return new self(
            $low,
            $medium,
            $high
        );
    }
}