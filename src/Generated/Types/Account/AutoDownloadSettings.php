<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AutoDownloadSettings as BaseAutoDownloadSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.autoDownloadSettings
 */
final class AutoDownloadSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x63cacf26;
    
    public string $_ = 'account.autoDownloadSettings';
    
    /**
     * @param BaseAutoDownloadSettings $low
     * @param BaseAutoDownloadSettings $medium
     * @param BaseAutoDownloadSettings $high
     */
    public function __construct(
        public readonly BaseAutoDownloadSettings $low,
        public readonly BaseAutoDownloadSettings $medium,
        public readonly BaseAutoDownloadSettings $high
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $low = BaseAutoDownloadSettings::deserialize($deserializer, $stream);
        $medium = BaseAutoDownloadSettings::deserialize($deserializer, $stream);
        $high = BaseAutoDownloadSettings::deserialize($deserializer, $stream);
        return new self(
            $low,
            $medium,
            $high
        );
    }
}