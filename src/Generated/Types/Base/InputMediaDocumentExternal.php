<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaDocumentExternal
 */
final class InputMediaDocumentExternal extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x779600f9;
    
    public string $predicate = 'inputMediaDocumentExternal';
    
    /**
     * @param string $url
     * @param true|null $spoiler
     * @param int|null $ttlSeconds
     * @param AbstractInputPhoto|null $videoCover
     * @param int|null $videoTimestamp
     */
    public function __construct(
        public readonly string $url,
        public readonly ?true $spoiler = null,
        public readonly ?int $ttlSeconds = null,
        public readonly ?AbstractInputPhoto $videoCover = null,
        public readonly ?int $videoTimestamp = null
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
        if ($this->videoCover !== null) {
            $flags |= (1 << 2);
        }
        if ($this->videoTimestamp !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->videoCover->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->videoTimestamp);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $spoiler = (($flags & (1 << 1)) !== 0) ? true : null;
        $url = Deserializer::bytes($__payload, $__offset);
        $ttlSeconds = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $videoCover = (($flags & (1 << 2)) !== 0) ? AbstractInputPhoto::deserialize($__payload, $__offset) : null;
        $videoTimestamp = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $url,
            $spoiler,
            $ttlSeconds,
            $videoCover,
            $videoTimestamp
        );
    }
}