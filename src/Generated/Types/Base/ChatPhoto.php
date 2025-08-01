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
    public const CONSTRUCTOR_ID = 476978193;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasVideo) $flags |= (1 << 0);
        if ($this->strippedThumb !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->photoId);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->strippedThumb);
        }
        $buffer .= $serializer->int32($this->dcId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hasVideo = ($flags & (1 << 0)) ? true : null;
        $photoId = $deserializer->int64($stream);
        $strippedThumb = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $dcId = $deserializer->int32($stream);
            return new self(
            $photoId,
            $dcId,
            $hasVideo,
            $strippedThumb
        );
    }
}