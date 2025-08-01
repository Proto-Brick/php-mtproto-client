<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotPreviewMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.editPreviewMedia
 */
final class EditPreviewMediaRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2233819247;
    
    public string $_ = 'bots.editPreviewMedia';
    
    public function getMethodName(): string
    {
        return 'bots.editPreviewMedia';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBotPreviewMedia::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $langCode
     * @param AbstractInputMedia $media
     * @param AbstractInputMedia $newMedia
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $langCode,
        public readonly AbstractInputMedia $media,
        public readonly AbstractInputMedia $newMedia
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->bytes($this->langCode);
        $buffer .= $this->media->serialize($serializer);
        $buffer .= $this->newMedia->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}