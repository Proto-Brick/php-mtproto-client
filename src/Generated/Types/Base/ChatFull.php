<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatFull
 */
final class ChatFull extends AbstractChatFull
{
    public const CONSTRUCTOR_ID = 0x2633421b;
    
    public string $predicate = 'chatFull';
    
    /**
     * @param int $id
     * @param string $about
     * @param AbstractChatParticipants $participants
     * @param PeerNotifySettings $notifySettings
     * @param true|null $canSetUsername
     * @param true|null $hasScheduled
     * @param true|null $translationsDisabled
     * @param AbstractPhoto|null $chatPhoto
     * @param AbstractExportedChatInvite|null $exportedInvite
     * @param list<BotInfo>|null $botInfo
     * @param int|null $pinnedMsgId
     * @param int|null $folderId
     * @param AbstractInputGroupCall|null $call
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
        public readonly ?true $canSetUsername = null,
        public readonly ?true $hasScheduled = null,
        public readonly ?true $translationsDisabled = null,
        public readonly ?AbstractPhoto $chatPhoto = null,
        public readonly ?AbstractExportedChatInvite $exportedInvite = null,
        public readonly ?array $botInfo = null,
        public readonly ?int $pinnedMsgId = null,
        public readonly ?int $folderId = null,
        public readonly ?AbstractInputGroupCall $call = null,
        public readonly ?int $ttlPeriod = null,
        public readonly ?AbstractPeer $groupcallDefaultJoinAs = null,
        public readonly ?string $themeEmoticon = null,
        public readonly ?int $requestsPending = null,
        public readonly ?array $recentRequesters = null,
        public readonly ?AbstractChatReactions $availableReactions = null,
        public readonly ?int $reactionsLimit = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canSetUsername) {
            $flags |= (1 << 7);
        }
        if ($this->hasScheduled) {
            $flags |= (1 << 8);
        }
        if ($this->translationsDisabled) {
            $flags |= (1 << 19);
        }
        if ($this->chatPhoto !== null) {
            $flags |= (1 << 2);
        }
        if ($this->exportedInvite !== null) {
            $flags |= (1 << 13);
        }
        if ($this->botInfo !== null) {
            $flags |= (1 << 3);
        }
        if ($this->pinnedMsgId !== null) {
            $flags |= (1 << 6);
        }
        if ($this->folderId !== null) {
            $flags |= (1 << 11);
        }
        if ($this->call !== null) {
            $flags |= (1 << 12);
        }
        if ($this->ttlPeriod !== null) {
            $flags |= (1 << 14);
        }
        if ($this->groupcallDefaultJoinAs !== null) {
            $flags |= (1 << 15);
        }
        if ($this->themeEmoticon !== null) {
            $flags |= (1 << 16);
        }
        if ($this->requestsPending !== null) {
            $flags |= (1 << 17);
        }
        if ($this->recentRequesters !== null) {
            $flags |= (1 << 17);
        }
        if ($this->availableReactions !== null) {
            $flags |= (1 << 18);
        }
        if ($this->reactionsLimit !== null) {
            $flags |= (1 << 20);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->about);
        $buffer .= $this->participants->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->chatPhoto->serialize();
        }
        $buffer .= $this->notifySettings->serialize();
        if ($flags & (1 << 13)) {
            $buffer .= $this->exportedInvite->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->botInfo);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->pinnedMsgId);
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        if ($flags & (1 << 12)) {
            $buffer .= $this->call->serialize();
        }
        if ($flags & (1 << 14)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->groupcallDefaultJoinAs->serialize();
        }
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::bytes($this->themeEmoticon);
        }
        if ($flags & (1 << 17)) {
            $buffer .= Serializer::int32($this->requestsPending);
        }
        if ($flags & (1 << 17)) {
            $buffer .= Serializer::vectorOfLongs($this->recentRequesters);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->availableReactions->serialize();
        }
        if ($flags & (1 << 20)) {
            $buffer .= Serializer::int32($this->reactionsLimit);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $canSetUsername = (($flags & (1 << 7)) !== 0) ? true : null;
        $hasScheduled = (($flags & (1 << 8)) !== 0) ? true : null;
        $translationsDisabled = (($flags & (1 << 19)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $about = Deserializer::bytes($__payload, $__offset);
        $participants = AbstractChatParticipants::deserialize($__payload, $__offset);
        $chatPhoto = (($flags & (1 << 2)) !== 0) ? AbstractPhoto::deserialize($__payload, $__offset) : null;
        $notifySettings = PeerNotifySettings::deserialize($__payload, $__offset);
        $exportedInvite = (($flags & (1 << 13)) !== 0) ? AbstractExportedChatInvite::deserialize($__payload, $__offset) : null;
        $botInfo = (($flags & (1 << 3)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [BotInfo::class, 'deserialize']) : null;
        $pinnedMsgId = (($flags & (1 << 6)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $folderId = (($flags & (1 << 11)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $call = (($flags & (1 << 12)) !== 0) ? AbstractInputGroupCall::deserialize($__payload, $__offset) : null;
        $ttlPeriod = (($flags & (1 << 14)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $groupcallDefaultJoinAs = (($flags & (1 << 15)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $themeEmoticon = (($flags & (1 << 16)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $requestsPending = (($flags & (1 << 17)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $recentRequesters = (($flags & (1 << 17)) !== 0) ? Deserializer::vectorOfLongs($__payload, $__offset) : null;
        $availableReactions = (($flags & (1 << 18)) !== 0) ? AbstractChatReactions::deserialize($__payload, $__offset) : null;
        $reactionsLimit = (($flags & (1 << 20)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

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