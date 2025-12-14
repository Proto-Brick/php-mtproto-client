<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/statsGroupTopAdmin
 */
final class StatsGroupTopAdmin extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd7584c87;
    
    public string $predicate = 'statsGroupTopAdmin';
    
    /**
     * @param int $userId
     * @param int $deleted
     * @param int $kicked
     * @param int $banned
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $deleted,
        public readonly int $kicked,
        public readonly int $banned
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->deleted);
        $buffer .= Serializer::int32($this->kicked);
        $buffer .= Serializer::int32($this->banned);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $deleted = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $kicked = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $banned = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $userId,
            $deleted,
            $kicked,
            $banned
        );
    }
}