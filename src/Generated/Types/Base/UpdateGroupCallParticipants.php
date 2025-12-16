<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateGroupCallParticipants
 */
final class UpdateGroupCallParticipants extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf2ebdb4e;
    
    public string $predicate = 'updateGroupCallParticipants';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param list<GroupCallParticipant> $participants
     * @param int $version
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $participants,
        public readonly int $version
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfObjects($this->participants);
        $buffer .= Serializer::int32($this->version);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $call = AbstractInputGroupCall::deserialize($stream);
        $participants = Deserializer::vectorOfObjects($stream, [GroupCallParticipant::class, 'deserialize']);
        $version = Deserializer::int32($stream);

        return new self(
            $call,
            $participants,
            $version
        );
    }
}