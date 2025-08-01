<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotPreviewMedia;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/bots.previewInfo
 */
final class PreviewInfo extends AbstractPreviewInfo
{
    public const CONSTRUCTOR_ID = 212278628;
    
    public string $_ = 'bots.previewInfo';
    
    /**
     * @param list<AbstractBotPreviewMedia> $media
     * @param list<string> $langCodes
     */
    public function __construct(
        public readonly array $media,
        public readonly array $langCodes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->media);
        $buffer .= $serializer->vectorOfStrings($this->langCodes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $media = $deserializer->vectorOfObjects($stream, [AbstractBotPreviewMedia::class, 'deserialize']);
        $langCodes = $deserializer->vectorOfStrings($stream);
            return new self(
            $media,
            $langCodes
        );
    }
}