<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatPhoto
 */
final class ChatPhoto extends AbstractChatPhoto
{
    public const CONSTRUCTOR_ID = 0x1c6e1c11;
    
    public string $predicate = 'chatPhoto';
    
    /**
     * @param int $photoId
     * @param int $dcId
     * @param true|null $hasVideo
     * @param string|null $strippedThumb
     */
    public function __construct(
        public readonly int $photoId,
        public readonly int $dcId,
        public readonly ?true $hasVideo = null,
        public readonly ?string $strippedThumb = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasVideo) {
            $flags |= (1 << 0);
        }
        if ($this->strippedThumb !== null) {
            $flags |= (1 << 1);
        }
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
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $hasVideo = (($flags & (1 << 0)) !== 0) ? true : null;
        $photoId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $strippedThumb = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $dcId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $photoId,
            $dcId,
            $hasVideo,
            $strippedThumb
        );
    }
}