<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/labeledPrice
 */
final class LabeledPrice extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcb296bf8;
    
    public string $predicate = 'labeledPrice';
    
    /**
     * @param string $label
     * @param int $amount
     */
    public function __construct(
        public readonly string $label,
        public readonly int $amount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->label);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $label = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);

        return new self(
            $label,
            $amount
        );
    }
}