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
    public const CONSTRUCTOR_ID = 299870598;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->bytes($this->about);
        $buffer .= $this->invite->serialize($serializer);
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $date = $deserializer->int32($stream);
        $userId = $deserializer->int64($stream);
        $about = $deserializer->bytes($stream);
        $invite = AbstractExportedChatInvite::deserialize($deserializer, $stream);
        $qts = $deserializer->int32($stream);
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