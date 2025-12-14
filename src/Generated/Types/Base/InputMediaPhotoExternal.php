<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaPhotoExternal
 */
final class InputMediaPhotoExternal extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xe5bbfe1a;
    
    public string $predicate = 'inputMediaPhotoExternal';
    
    /**
     * @param string $url
     * @param true|null $spoiler
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly string $url,
        public readonly ?true $spoiler = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) {
            $flags |= (1 << 1);
        }
        if ($this->ttlSeconds !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $spoiler = (($flags & (1 << 1)) !== 0) ? true : null;
        $url = Deserializer::bytes($stream);
        $ttlSeconds = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $url,
            $spoiler,
            $ttlSeconds
        );
    }
}