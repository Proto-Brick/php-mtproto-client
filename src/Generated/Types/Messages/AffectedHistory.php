<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.affectedHistory
 */
final class AffectedHistory extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb45c69d1;
    
    public string $predicate = 'messages.affectedHistory';
    
    /**
     * @param int $pts
     * @param int $ptsCount
     * @param int $offset
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly int $offset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        $buffer .= Serializer::int32($this->offset);
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
        $ptsCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $offset = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $pts,
            $ptsCount,
            $offset
        );
    }
}