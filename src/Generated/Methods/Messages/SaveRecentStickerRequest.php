<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.saveRecentSticker
 */
final class SaveRecentStickerRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x392718f8;
    
    public string $_ = 'messages.saveRecentSticker';
    
    public function getMethodName(): string
    {
        return 'messages.saveRecentSticker';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputDocument $id
     * @param bool $unsave
     * @param bool|null $attached
     */
    public function __construct(
        public readonly AbstractInputDocument $id,
        public readonly bool $unsave,
        public readonly ?bool $attached = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->attached) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->id->serialize($serializer);
        $buffer .= ($this->unsave ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}