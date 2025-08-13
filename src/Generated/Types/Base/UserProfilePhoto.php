<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/userProfilePhoto
 */
final class UserProfilePhoto extends AbstractUserProfilePhoto
{
    public const CONSTRUCTOR_ID = 0x82d1f706;
    
    public string $predicate = 'userProfilePhoto';
    
    /**
     * @param int $photoId
     * @param int $dcId
     * @param true|null $hasVideo
     * @param true|null $personal
     * @param string|null $strippedThumb
     */
    public function __construct(
        public readonly int $photoId,
        public readonly int $dcId,
        public readonly ?true $hasVideo = null,
        public readonly ?true $personal = null,
        public readonly ?string $strippedThumb = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasVideo) {
            $flags |= (1 << 0);
        }
        if ($this->personal) {
            $flags |= (1 << 2);
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
        $flags = Deserializer::int32($stream);
        $hasVideo = (($flags & (1 << 0)) !== 0) ? true : null;
        $personal = (($flags & (1 << 2)) !== 0) ? true : null;
        $photoId = Deserializer::int64($stream);
        $strippedThumb = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $dcId = Deserializer::int32($stream);

        return new self(
            $photoId,
            $dcId,
            $hasVideo,
            $personal,
            $strippedThumb
        );
    }
}