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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $date = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        $about = Deserializer::bytes($stream);
        $invite = AbstractExportedChatInvite::deserialize($stream);
        $qts = Deserializer::int32($stream);

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