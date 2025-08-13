<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/highScore
 */
final class HighScore extends TlObject
{
    public const CONSTRUCTOR_ID = 0x73a379eb;
    
    public string $predicate = 'highScore';
    
    /**
     * @param int $pos
     * @param int $userId
     * @param int $score
     */
    public function __construct(
        public readonly int $pos,
        public readonly int $userId,
        public readonly int $score
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pos);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->score);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $pos = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        $score = Deserializer::int32($stream);

        return new self(
            $pos,
            $userId,
            $score
        );
    }
}