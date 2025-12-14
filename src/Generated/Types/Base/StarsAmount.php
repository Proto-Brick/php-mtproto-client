<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starsAmount
 */
final class StarsAmount extends AbstractStarsAmount
{
    public const CONSTRUCTOR_ID = 0xbbb6b4a3;
    
    public string $predicate = 'starsAmount';
    
    /**
     * @param int $amount
     * @param int $nanos
     */
    public function __construct(
        public readonly int $amount,
        public readonly int $nanos
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int32($this->nanos);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $amount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $nanos = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $amount,
            $nanos
        );
    }
}