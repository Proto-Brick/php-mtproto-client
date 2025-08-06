<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.uninstallStickerSet
 */
final class UninstallStickerSetRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf96e55de;
    
    public string $_ = 'messages.uninstallStickerSet';
    
    public function getMethodName(): string
    {
        return 'messages.uninstallStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}