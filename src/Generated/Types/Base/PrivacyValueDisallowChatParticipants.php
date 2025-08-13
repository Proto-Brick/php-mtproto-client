<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/privacyValueDisallowChatParticipants
 */
final class PrivacyValueDisallowChatParticipants extends AbstractPrivacyRule
{
    public const CONSTRUCTOR_ID = 0x41c87565;
    
    public string $predicate = 'privacyValueDisallowChatParticipants';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $chats = Deserializer::vectorOfLongs($stream);

        return new self(
            $chats
        );
    }
}