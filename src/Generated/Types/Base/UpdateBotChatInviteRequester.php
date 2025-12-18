<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotChatInviteRequester
 */
final class UpdateBotChatInviteRequester extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x11dfa986;
    
    public string $predicate = 'updateBotChatInviteRequester';
    
    /**
     * @param AbstractPeer $peer
     * @param int $date
     * @param int $userId
     * @param string $about
     * @param AbstractExportedChatInvite $invite
     * @param int $qts
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $date,
        public readonly int $userId,
        public readonly string $about,
        public readonly AbstractExportedChatInvite $invite,
        public readonly int $qts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->about);
        $buffer .= $this->invite->serialize();
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $about = Deserializer::bytes($__payload, $__offset);
        $invite = AbstractExportedChatInvite::deserialize($__payload, $__offset);
        $qts = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $date,
            $userId,
            $about,
            $invite,
            $qts
        );
    }
}