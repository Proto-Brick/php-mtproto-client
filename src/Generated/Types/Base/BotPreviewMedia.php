<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botPreviewMedia
 */
final class BotPreviewMedia extends TlObject
{
    public const CONSTRUCTOR_ID = 0x23e91ba3;
    
    public string $_ = 'botPreviewMedia';
    
    /**
     * @param int $date
     * @param AbstractMessageMedia $media
     */
    public function __construct(
        public readonly int $date,
        public readonly AbstractMessageMedia $media
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->media->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $date = Deserializer::int32($stream);
        $media = AbstractMessageMedia::deserialize($stream);
        return new self(
            $date,
            $media
        );
    }
}