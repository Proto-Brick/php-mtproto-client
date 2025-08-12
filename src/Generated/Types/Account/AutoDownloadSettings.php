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
    
    public string $predicate = 'account.autoDownloadSettings';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->low->serialize();
        $buffer .= $this->medium->serialize();
        $buffer .= $this->high->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $low = BaseAutoDownloadSettings::deserialize($stream);
        $medium = BaseAutoDownloadSettings::deserialize($stream);
        $high = BaseAutoDownloadSettings::deserialize($stream);

        return new self(
            $low,
            $medium,
            $high
        );
    }
}