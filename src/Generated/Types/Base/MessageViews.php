<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messageViews
 */
final class MessageViews extends TlObject
{
    public const CONSTRUCTOR_ID = 0x455b853d;
    
    public string $predicate = 'messageViews';
    
    /**
     * @param int|null $views
     * @param int|null $forwards
     * @param MessageReplies|null $replies
     */
    public function __construct(
        public readonly ?int $views = null,
        public readonly ?int $forwards = null,
        public readonly ?MessageReplies $replies = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->views !== null) {
            $flags |= (1 << 0);
        }
        if ($this->forwards !== null) {
            $flags |= (1 << 1);
        }
        if ($this->replies !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->views);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->forwards);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->replies->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $views = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $forwards = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;
        $replies = (($flags & (1 << 2)) !== 0) ? MessageReplies::deserialize($stream) : null;

        return new self(
            $views,
            $forwards,
            $replies
        );
    }
}