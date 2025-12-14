<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageEntityBlockquote
 */
final class MessageEntityBlockquote extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0xf1ccaaac;
    
    public string $predicate = 'messageEntityBlockquote';
    
    /**
     * @param int $offset
     * @param int $length
     * @param true|null $collapsed
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly ?true $collapsed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->collapsed) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $collapsed = (($flags & (1 << 0)) !== 0) ? true : null;
        $offset = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $length = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $offset,
            $length,
            $collapsed
        );
    }
}