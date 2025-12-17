<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPrivacyValueDisallowChatParticipants
 */
final class InputPrivacyValueDisallowChatParticipants extends AbstractInputPrivacyRule
{
    public const CONSTRUCTOR_ID = 0xe94f0f86;
    
    public string $predicate = 'inputPrivacyValueDisallowChatParticipants';
    
    /**
     * @param list<int> $chats
     */
    public function __construct(
        public readonly array $chats
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->chats);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $chats = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $chats
        );
    }
}