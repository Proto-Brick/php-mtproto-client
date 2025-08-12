<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/peerSettings
 */
final class PeerSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xacd66c5e;
    
    public string $predicate = 'peerSettings';
    
    /**
     * @param true|null $reportSpam
     * @param true|null $addContact
     * @param true|null $blockContact
     * @param true|null $shareContact
     * @param true|null $needContactsException
     * @param true|null $reportGeo
     * @param true|null $autoarchived
     * @param true|null $inviteMembers
     * @param true|null $requestChatBroadcast
     * @param true|null $businessBotPaused
     * @param true|null $businessBotCanReply
     * @param int|null $geoDistance
     * @param string|null $requestChatTitle
     * @param int|null $requestChatDate
     * @param int|null $businessBotId
     * @param string|null $businessBotManageUrl
     */
    public function __construct(
        public readonly ?true $reportSpam = null,
        public readonly ?true $addContact = null,
        public readonly ?true $blockContact = null,
        public readonly ?true $shareContact = null,
        public readonly ?true $needContactsException = null,
        public readonly ?true $reportGeo = null,
        public readonly ?true $autoarchived = null,
        public readonly ?true $inviteMembers = null,
        public readonly ?true $requestChatBroadcast = null,
        public readonly ?true $businessBotPaused = null,
        public readonly ?true $businessBotCanReply = null,
        public readonly ?int $geoDistance = null,
        public readonly ?string $requestChatTitle = null,
        public readonly ?int $requestChatDate = null,
        public readonly ?int $businessBotId = null,
        public readonly ?string $businessBotManageUrl = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->reportSpam) $flags |= (1 << 0);
        if ($this->addContact) $flags |= (1 << 1);
        if ($this->blockContact) $flags |= (1 << 2);
        if ($this->shareContact) $flags |= (1 << 3);
        if ($this->needContactsException) $flags |= (1 << 4);
        if ($this->reportGeo) $flags |= (1 << 5);
        if ($this->autoarchived) $flags |= (1 << 7);
        if ($this->inviteMembers) $flags |= (1 << 8);
        if ($this->requestChatBroadcast) $flags |= (1 << 10);
        if ($this->businessBotPaused) $flags |= (1 << 11);
        if ($this->businessBotCanReply) $flags |= (1 << 12);
        if ($this->geoDistance !== null) $flags |= (1 << 6);
        if ($this->requestChatTitle !== null) $flags |= (1 << 9);
        if ($this->requestChatDate !== null) $flags |= (1 << 9);
        if ($this->businessBotId !== null) $flags |= (1 << 13);
        if ($this->businessBotManageUrl !== null) $flags |= (1 << 13);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->geoDistance);
        }
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::bytes($this->requestChatTitle);
        }
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::int32($this->requestChatDate);
        }
        if ($flags & (1 << 13)) {
            $buffer .= Serializer::int64($this->businessBotId);
        }
        if ($flags & (1 << 13)) {
            $buffer .= Serializer::bytes($this->businessBotManageUrl);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $reportSpam = ($flags & (1 << 0)) ? true : null;
        $addContact = ($flags & (1 << 1)) ? true : null;
        $blockContact = ($flags & (1 << 2)) ? true : null;
        $shareContact = ($flags & (1 << 3)) ? true : null;
        $needContactsException = ($flags & (1 << 4)) ? true : null;
        $reportGeo = ($flags & (1 << 5)) ? true : null;
        $autoarchived = ($flags & (1 << 7)) ? true : null;
        $inviteMembers = ($flags & (1 << 8)) ? true : null;
        $requestChatBroadcast = ($flags & (1 << 10)) ? true : null;
        $businessBotPaused = ($flags & (1 << 11)) ? true : null;
        $businessBotCanReply = ($flags & (1 << 12)) ? true : null;
        $geoDistance = ($flags & (1 << 6)) ? Deserializer::int32($stream) : null;
        $requestChatTitle = ($flags & (1 << 9)) ? Deserializer::bytes($stream) : null;
        $requestChatDate = ($flags & (1 << 9)) ? Deserializer::int32($stream) : null;
        $businessBotId = ($flags & (1 << 13)) ? Deserializer::int64($stream) : null;
        $businessBotManageUrl = ($flags & (1 << 13)) ? Deserializer::bytes($stream) : null;

        return new self(
            $reportSpam,
            $addContact,
            $blockContact,
            $shareContact,
            $needContactsException,
            $reportGeo,
            $autoarchived,
            $inviteMembers,
            $requestChatBroadcast,
            $businessBotPaused,
            $businessBotCanReply,
            $geoDistance,
            $requestChatTitle,
            $requestChatDate,
            $businessBotId,
            $businessBotManageUrl
        );
    }
}