<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChatParticipants
 */
final class UpdateChatParticipants extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7761198;
    
    public string $predicate = 'updateChatParticipants';
    
    /**
     * @param AbstractChatParticipants $participants
     */
    public function __construct(
        public readonly AbstractChatParticipants $participants
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->participants->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $participants = AbstractChatParticipants::deserialize($__payload, $__offset);

        return new self(
            $participants
        );
    }
}