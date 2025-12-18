<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionChatCreate
 */
final class MessageActionChatCreate extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xbd47cbad;
    
    public string $predicate = 'messageActionChatCreate';
    
    /**
     * @param string $title
     * @param list<int> $users
     */
    public function __construct(
        public readonly string $title,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::vectorOfLongs($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $title = Deserializer::bytes($__payload, $__offset);
        $users = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $title,
            $users
        );
    }
}