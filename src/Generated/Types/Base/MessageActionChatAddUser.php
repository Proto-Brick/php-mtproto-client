<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionChatAddUser
 */
final class MessageActionChatAddUser extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x15cefd00;
    
    public string $predicate = 'messageActionChatAddUser';
    
    /**
     * @param list<int> $users
     */
    public function __construct(
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $users = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $users
        );
    }
}