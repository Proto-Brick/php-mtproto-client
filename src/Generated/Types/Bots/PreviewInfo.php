<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\BotPreviewMedia;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/bots.previewInfo
 */
final class PreviewInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0xca71d64;
    
    public string $_ = 'bots.previewInfo';
    
    /**
     * @param list<BotPreviewMedia> $media
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $media = $deserializer->vectorOfObjects($stream, [BotPreviewMedia::class, 'deserialize']);
        $langCodes = $deserializer->vectorOfStrings($stream);
        return new self(
            $media,
            $langCodes
        );
    }
}