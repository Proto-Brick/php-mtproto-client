<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelForbidden
 */
final class ChannelForbidden extends AbstractChat
{
    public const CONSTRUCTOR_ID = 0x17d493d5;
    
    public string $predicate = 'channelForbidden';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $title
     * @param true|null $broadcast
     * @param true|null $megagroup
     * @param int|null $untilDate
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $title,
        public readonly ?true $broadcast = null,
        public readonly ?true $megagroup = null,
        public readonly ?int $untilDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcast) {
            $flags |= (1 << 5);
        }
        if ($this->megagroup) {
            $flags |= (1 << 8);
        }
        if ($this->untilDate !== null) {
            $flags |= (1 << 16);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::int32($this->untilDate);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $broadcast = (($flags & (1 << 5)) !== 0) ? true : null;
        $megagroup = (($flags & (1 << 8)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $untilDate = (($flags & (1 << 16)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $id,
            $accessHash,
            $title,
            $broadcast,
            $megagroup,
            $untilDate
        );
    }
}