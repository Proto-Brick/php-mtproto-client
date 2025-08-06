<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputGroupCallStream
 */
final class InputGroupCallStream extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0x598a92a;
    
    public string $_ = 'inputGroupCallStream';
    
    /**
     * @param InputGroupCall $call
     * @param int $timeMs
     * @param int $scale
     * @param int|null $videoChannel
     * @param int|null $videoQuality
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly int $timeMs,
        public readonly int $scale,
        public readonly ?int $videoChannel = null,
        public readonly ?int $videoQuality = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->videoChannel !== null) $flags |= (1 << 0);
        if ($this->videoQuality !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->int64($this->timeMs);
        $buffer .= $serializer->int32($this->scale);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->videoChannel);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->videoQuality);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $call = InputGroupCall::deserialize($deserializer, $stream);
        $timeMs = $deserializer->int64($stream);
        $scale = $deserializer->int32($stream);
        $videoChannel = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $videoQuality = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        return new self(
            $call,
            $timeMs,
            $scale,
            $videoChannel,
            $videoQuality
        );
    }
}