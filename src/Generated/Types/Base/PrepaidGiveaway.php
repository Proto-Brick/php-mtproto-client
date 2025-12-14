<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/prepaidGiveaway
 */
final class PrepaidGiveaway extends AbstractPrepaidGiveaway
{
    public const CONSTRUCTOR_ID = 0xb2539d54;
    
    public string $predicate = 'prepaidGiveaway';
    
    /**
     * @param int $id
     * @param int $months
     * @param int $quantity
     * @param int $date
     */
    public function __construct(
        public readonly int $id,
        public readonly int $months,
        public readonly int $quantity,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($this->months);
        $buffer .= Serializer::int32($this->quantity);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $months = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $quantity = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $id,
            $months,
            $quantity,
            $date
        );
    }
}