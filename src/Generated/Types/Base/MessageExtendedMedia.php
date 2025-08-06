<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageExtendedMedia
 */
final class MessageExtendedMedia extends AbstractMessageExtendedMedia
{
    public const CONSTRUCTOR_ID = 0xee479c64;
    
    public string $_ = 'messageExtendedMedia';
    
    /**
     * @param AbstractMessageMedia $media
     */
    public function __construct(
        public readonly AbstractMessageMedia $media
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->media->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $media = AbstractMessageMedia::deserialize($deserializer, $stream);
        return new self(
            $media
        );
    }
}