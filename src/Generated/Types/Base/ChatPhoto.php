<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatPhoto
 */
final class ChatPhoto extends AbstractChatPhoto
{
    public const CONSTRUCTOR_ID = 0x1c6e1c11;
    
    public string $_ = 'chatPhoto';
    
    /**
     * @param int $photoId
     * @param int $dcId
     * @param bool|null $hasVideo
     * @param string|null $strippedThumb
     */
    public function __construct(
        public readonly int $photoId,
        public readonly int $dcId,
        public readonly ?bool $hasVideo = null,
        public readonly ?string $strippedThumb = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasVideo) $flags |= (1 << 0);
        if ($this->strippedThumb !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->photoId);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->strippedThumb);
        }
        $buffer .= Serializer::int32($this->dcId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $hasVideo = ($flags & (1 << 0)) ? true : null;
        $photoId = Deserializer::int64($stream);
        $strippedThumb = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $dcId = Deserializer::int32($stream);
        return new self(
            $photoId,
            $dcId,
            $hasVideo,
            $strippedThumb
        );
    }
}