<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starsSubscriptionPricing
 */
final class StarsSubscriptionPricing extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5416d58;
    
    public string $predicate = 'starsSubscriptionPricing';
    
    /**
     * @param int $period
     * @param int $amount
     */
    public function __construct(
        public readonly int $period,
        public readonly int $amount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->period);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $period = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $amount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $period,
            $amount
        );
    }
}