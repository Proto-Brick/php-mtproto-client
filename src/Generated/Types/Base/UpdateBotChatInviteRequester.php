<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotChatInviteRequester
 */
final class UpdateBotChatInviteRequester extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x11dfa986;
    
    public string $_ = 'updateBotChatInviteRequester';
    
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
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