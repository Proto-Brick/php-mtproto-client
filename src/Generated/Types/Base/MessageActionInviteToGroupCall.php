<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionInviteToGroupCall
 */
final class MessageActionInviteToGroupCall extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x502f92f7;
    
    public string $predicate = 'messageActionInviteToGroupCall';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param list<int> $users
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfLongs($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $call = AbstractInputGroupCall::deserialize($__payload, $__offset);
        $users = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $call,
            $users
        );
    }
}