<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatFull
 */
final class ChatFull extends AbstractChatFull
{
    public const CONSTRUCTOR_ID = 0x2633421b;
    
    public string $_ = 'chatFull';
    
    /**
     * @param int $id
     * @param string $about
     * @param AbstractChatParticipants $participants
     * @param PeerNotifySettings $notifySettings
     * @param bool|null $canSetUsername
     * @param bool|null $hasScheduled
     * @param bool|null $translationsDisabled
     * @param AbstractPhoto|null $chatPhoto
     * @param AbstractExportedChatInvite|null $exportedInvite
     * @param list<BotInfo>|null $botInfo
     * @param int|null $pinnedMsgId
     * @param int|null $folderId
     * @param InputGroupCall|null $call
     * @param int|null $ttlPeriod
     * @param AbstractPeer|null $groupcallDefaultJoinAs
     * @param string|null $themeEmoticon
     * @param int|null $requestsPending
     * @param list<int>|null $recentRequesters
     * @param AbstractChatReactions|null $availableReactions
     * @param int|null $reactionsLimit
     */
    public function __construct(
        public readonly int $id,
        public readonly string $about,
        public readonly AbstractChatParticipants $participants,
        public readonly PeerNotifySettings $notifySettings,
        public readonly ?bool $canSetUsername = null,
        public readonly ?bool $hasScheduled = null,
        public readonly ?bool $translationsDisabled = null,
        public readonly ?AbstractPhoto $chatPhoto = null,
        public readonly ?AbstractExportedChatInvite $exportedInvite = null,
        public readonly ?array $botInfo = null,
        public readonly ?int $pinnedMsgId = null,
        public readonly ?int $folderId = null,
        public readonly ?InputGroupCall $call = null,
        public readonly ?int $ttlPeriod = null,
        public readonly ?AbstractPeer $groupcallDefaultJoinAs = null,
        public readonly ?string $themeEmoticon = null,
        public readonly ?int $requestsPending = null,
        public readonly ?array $recentRequesters = null,
        public readonly ?AbstractChatReactions $availableReactions = null,
        public readonly ?int $reactionsLimit = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canSetUsername) $flags |= (1 << 7);
        if ($this->hasScheduled) $flags |= (1 << 8);
        if ($this->translationsDisabled) $flags |= (1 << 19);
        if ($this->chatPhoto !== null) $flags |= (1 << 2);
        if ($this->exportedInvite !== null) $flags |= (1 << 13);
        if ($this->botInfo !== null) $flags |= (1 << 3);
        if ($this->pinnedMsgId !== null) $flags |= (1 << 6);
        if ($this->folderId !== null) $flags |= (1 << 11);
        if ($this->call !== null) $flags |= (1 << 12);
        if ($this->ttlPeriod !== null) $flags |= (1 << 14);
        if ($this->groupcallDefaultJoinAs !== null) $flags |= (1 << 15);
        if ($this->themeEmoticon !== null) $flags |= (1 << 16);
        if ($this->requestsPending !== null) $flags |= (1 << 17);
        if ($this->recentRequesters !== null) $flags |= (1 << 17);
        if ($this->availableReactions !== null) $flags |= (1 << 18);
        if ($this->reactionsLimit !== null) $flags |= (1 << 20);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->bytes($this->about);
        $buffer .= $this->participants->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $this->chatPhoto->serialize($serializer);
        }
        $buffer .= $this->notifySettings->serialize($serializer);
        if ($flags & (1 << 13)) {
            $buffer .= $this->exportedInvite->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->botInfo);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->int32($this->pinnedMsgId);
        }
        if ($flags & (1 << 11)) {
            $buffer .= $serializer->int32($this->folderId);
        }
        if ($flags & (1 << 12)) {
            $buffer .= $this->call->serialize($serializer);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $serializer->int32($this->ttlPeriod);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->groupcallDefaultJoinAs->serialize($serializer);
        }
        if ($flags & (1 << 16)) {
            $buffer .= $serializer->bytes($this->themeEmoticon);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $serializer->int32($this->requestsPending);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $serializer->vectorOfLongs($this->recentRequesters);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->availableReactions->serialize($serializer);
        }
        if ($flags & (1 << 20)) {
            $buffer .= $serializer->int32($this->reactionsLimit);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $canSetUsername = ($flags & (1 << 7)) ? true : null;
        $hasScheduled = ($flags & (1 << 8)) ? true : null;
        $translationsDisabled = ($flags & (1 << 19)) ? true : null;
        $id = $deserializer->int64($stream);
        $about = $deserializer->bytes($stream);
        $participants = AbstractChatParticipants::deserialize($deserializer, $stream);
        $chatPhoto = ($flags & (1 << 2)) ? AbstractPhoto::deserialize($deserializer, $stream) : null;
        $notifySettings = PeerNotifySettings::deserialize($deserializer, $stream);
        $exportedInvite = ($flags & (1 << 13)) ? AbstractExportedChatInvite::deserialize($deserializer, $stream) : null;
        $botInfo = ($flags & (1 << 3)) ? $deserializer->vectorOfObjects($stream, [BotInfo::class, 'deserialize']) : null;
        $pinnedMsgId = ($flags & (1 << 6)) ? $deserializer->int32($stream) : null;
        $folderId = ($flags & (1 << 11)) ? $deserializer->int32($stream) : null;
        $call = ($flags & (1 << 12)) ? InputGroupCall::deserialize($deserializer, $stream) : null;
        $ttlPeriod = ($flags & (1 << 14)) ? $deserializer->int32($stream) : null;
        $groupcallDefaultJoinAs = ($flags & (1 << 15)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $themeEmoticon = ($flags & (1 << 16)) ? $deserializer->bytes($stream) : null;
        $requestsPending = ($flags & (1 << 17)) ? $deserializer->int32($stream) : null;
        $recentRequesters = ($flags & (1 << 17)) ? $deserializer->vectorOfLongs($stream) : null;
        $availableReactions = ($flags & (1 << 18)) ? AbstractChatReactions::deserialize($deserializer, $stream) : null;
        $reactionsLimit = ($flags & (1 << 20)) ? $deserializer->int32($stream) : null;
        return new self(
            $id,
            $about,
            $participants,
            $notifySettings,
            $canSetUsername,
            $hasScheduled,
            $translationsDisabled,
            $chatPhoto,
            $exportedInvite,
            $botInfo,
            $pinnedMsgId,
            $folderId,
            $call,
            $ttlPeriod,
            $groupcallDefaultJoinAs,
            $themeEmoticon,
            $requestsPending,
            $recentRequesters,
            $availableReactions,
            $reactionsLimit
        );
    }
}