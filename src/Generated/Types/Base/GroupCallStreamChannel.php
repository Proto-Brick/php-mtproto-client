<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCallStreamChannel
 */
final class GroupCallStreamChannel extends TlObject
{
    public const CONSTRUCTOR_ID = 0x80eb48af;
    
    public string $predicate = 'groupCallStreamChannel';
    
    /**
     * @param int $channel
     * @param int $scale
     * @param int $lastTimestampMs
     */
    public function __construct(
        public readonly int $channel,
        public readonly int $scale,
        public readonly int $lastTimestampMs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->channel);
        $buffer .= Serializer::int32($this->scale);
        $buffer .= Serializer::int64($this->lastTimestampMs);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $channel = Deserializer::int32($stream);
        $scale = Deserializer::int32($stream);
        $lastTimestampMs = Deserializer::int64($stream);

        return new self(
            $channel,
            $scale,
            $lastTimestampMs
        );
    }
}