<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionGroupCall
 */
final class MessageActionGroupCall extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x7a0d7f42;
    
    public string $predicate = 'messageActionGroupCall';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param int|null $duration
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly ?int $duration = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->duration !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->duration);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $call = AbstractInputGroupCall::deserialize($stream);
        $duration = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $call,
            $duration
        );
    }
}