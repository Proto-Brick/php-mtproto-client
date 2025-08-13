<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaDocument
 */
final class InputMediaDocument extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xa8763ab5;
    
    public string $predicate = 'inputMediaDocument';
    
    /**
     * @param AbstractInputDocument $id
     * @param true|null $spoiler
     * @param AbstractInputPhoto|null $videoCover
     * @param int|null $videoTimestamp
     * @param int|null $ttlSeconds
     * @param string|null $query
     */
    public function __construct(
        public readonly AbstractInputDocument $id,
        public readonly ?true $spoiler = null,
        public readonly ?AbstractInputPhoto $videoCover = null,
        public readonly ?int $videoTimestamp = null,
        public readonly ?int $ttlSeconds = null,
        public readonly ?string $query = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) {
            $flags |= (1 << 2);
        }
        if ($this->videoCover !== null) {
            $flags |= (1 << 3);
        }
        if ($this->videoTimestamp !== null) {
            $flags |= (1 << 4);
        }
        if ($this->ttlSeconds !== null) {
            $flags |= (1 << 0);
        }
        if ($this->query !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->id->serialize();
        if ($flags & (1 << 3)) {
            $buffer .= $this->videoCover->serialize();
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->videoTimestamp);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->query);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $spoiler = (($flags & (1 << 2)) !== 0) ? true : null;
        $id = AbstractInputDocument::deserialize($stream);
        $videoCover = (($flags & (1 << 3)) !== 0) ? AbstractInputPhoto::deserialize($stream) : null;
        $videoTimestamp = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($stream) : null;
        $ttlSeconds = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $query = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;

        return new self(
            $id,
            $spoiler,
            $videoCover,
            $videoTimestamp,
            $ttlSeconds,
            $query
        );
    }
}