<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateGroupCallMessage
 */
final class UpdateGroupCallMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd8326f0d;
    
    public string $predicate = 'updateGroupCallMessage';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param GroupCallMessage $message
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly GroupCallMessage $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= $this->message->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $call = AbstractInputGroupCall::deserialize($__payload, $__offset);
        $message = GroupCallMessage::deserialize($__payload, $__offset);

        return new self(
            $call,
            $message
        );
    }
}