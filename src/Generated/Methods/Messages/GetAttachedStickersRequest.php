<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickeredMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSetCovered;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getAttachedStickers
 */
final class GetAttachedStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3428542412;
    
    public string $_ = 'messages.getAttachedStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getAttachedStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSetCovered::class;
    }
    /**
     * @param AbstractInputStickeredMedia $media
     */
    public function __construct(
        public readonly AbstractInputStickeredMedia $media
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->media->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}