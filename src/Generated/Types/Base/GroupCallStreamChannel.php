<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCallStreamChannel
 */
final class GroupCallStreamChannel extends AbstractGroupCallStreamChannel
{
    public const CONSTRUCTOR_ID = 2162903215;
    
    public string $_ = 'groupCallStreamChannel';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->channel);
        $buffer .= $serializer->int32($this->scale);
        $buffer .= $serializer->int64($this->lastTimestampMs);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channel = $deserializer->int32($stream);
        $scale = $deserializer->int32($stream);
        $lastTimestampMs = $deserializer->int64($stream);
            return new self(
            $channel,
            $scale,
            $lastTimestampMs
        );
    }
}