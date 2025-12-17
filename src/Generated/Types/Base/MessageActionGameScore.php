<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionGameScore
 */
final class MessageActionGameScore extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x92a72876;
    
    public string $predicate = 'messageActionGameScore';
    
    /**
     * @param int $gameId
     * @param int $score
     */
    public function __construct(
        public readonly int $gameId,
        public readonly int $score
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->gameId);
        $buffer .= Serializer::int32($this->score);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $gameId = Deserializer::int64($__payload, $__offset);
        $score = Deserializer::int32($__payload, $__offset);

        return new self(
            $gameId,
            $score
        );
    }
}