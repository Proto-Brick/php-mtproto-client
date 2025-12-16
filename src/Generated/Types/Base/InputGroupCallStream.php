<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputGroupCallStream
 */
final class InputGroupCallStream extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0x598a92a;
    
    public string $predicate = 'inputGroupCallStream';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param int $timeMs
     * @param int $scale
     * @param int|null $videoChannel
     * @param int|null $videoQuality
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $timeMs,
        public readonly int $scale,
        public readonly ?int $videoChannel = null,
        public readonly ?int $videoQuality = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->videoChannel !== null) {
            $flags |= (1 << 0);
        }
        if ($this->videoQuality !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int64($this->timeMs);
        $buffer .= Serializer::int32($this->scale);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->videoChannel);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->videoQuality);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $call = AbstractInputGroupCall::deserialize($stream);
        $timeMs = Deserializer::int64($stream);
        $scale = Deserializer::int32($stream);
        $videoChannel = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $videoQuality = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $call,
            $timeMs,
            $scale,
            $videoChannel,
            $videoQuality
        );
    }
}