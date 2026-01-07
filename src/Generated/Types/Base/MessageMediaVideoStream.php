<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaVideoStream
 */
final class MessageMediaVideoStream extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xca5cab89;
    
    public string $predicate = 'messageMediaVideoStream';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param true|null $rtmpStream
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly ?true $rtmpStream = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->rtmpStream) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $rtmpStream = (($flags & (1 << 0)) !== 0) ? true : null;
        $call = AbstractInputGroupCall::deserialize($__payload, $__offset);

        return new self(
            $call,
            $rtmpStream
        );
    }
}