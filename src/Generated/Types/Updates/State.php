<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/updates.state
 */
final class State extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa56c2a3e;
    
    public string $predicate = 'updates.state';
    
    /**
     * @param int $pts
     * @param int $qts
     * @param int $date
     * @param int $seq
     * @param int $unreadCount
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $qts,
        public readonly int $date,
        public readonly int $seq,
        public readonly int $unreadCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->qts);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->seq);
        $buffer .= Serializer::int32($this->unreadCount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $pts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $qts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $seq = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $unreadCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $pts,
            $qts,
            $date,
            $seq,
            $unreadCount
        );
    }
}