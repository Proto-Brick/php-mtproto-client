<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Event;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChannelCreate;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChannelMigrateFrom;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChatAddUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChatCreate;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChatDeletePhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChatDeleteUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChatEditPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChatEditTitle;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChatMigrateTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionPinMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageReplyHeader;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageService;

/**
 * Context for service events (System messages).
 *
 * @property-read MessageService $message The message object (type narrowed from AbstractMessage)
 * @api
 */
readonly class ServiceMessageContext extends AbstractMessageContext
{
    public function __construct(
        Client $client,
        MessageService $message
    ) {
        parent::__construct($client, $message);
    }

    /**
     * Get the ID of the user who triggered this event (e.g., who changed the title).
     * @api
     */
    public function getActorId(): ?int
    {
        return $this->message->fromId?->getId();
    }

    // ==========================================
    // 1. CHECKERS (Is it this type?)
    // ==========================================

    public function isUserJoined(): bool
    {
        return $this->message->action instanceof MessageActionChatAddUser;
    }

    public function isUserLeft(): bool
    {
        return $this->message->action instanceof MessageActionChatDeleteUser;
    }

    public function isTitleChanged(): bool
    {
        return $this->message->action instanceof MessageActionChatEditTitle;
    }

    public function isPhotoChanged(): bool
    {
        return $this->message->action instanceof MessageActionChatEditPhoto;
    }

    public function isPhotoDeleted(): bool
    {
        return $this->message->action instanceof MessageActionChatDeletePhoto;
    }

    public function isPin(): bool
    {
        return $this->message->action instanceof MessageActionPinMessage;
    }

    /**
     * Chat was created (Group or Channel).
     */
    public function isChatCreated(): bool
    {
        return $this->message->action instanceof MessageActionChatCreate
            || $this->message->action instanceof MessageActionChannelCreate;
    }

    /**
     * Group was migrated to a Supergroup.
     */
    public function isMigrated(): bool
    {
        return $this->message->action instanceof MessageActionChatMigrateTo
            || $this->message->action instanceof MessageActionChannelMigrateFrom;
    }

    // ==========================================
    // 2. DATA EXTRACTORS
    // ==========================================

    /**
     * @return int[] IDs of added/joined users.
     * @api
     */
    public function getJoinedUserIds(): array
    {
        $action = $this->message->action;
        return ($action instanceof MessageActionChatAddUser) ? $action->users : [];
    }

    /**
     * Get ID of the user who left or was kicked.
     * @api
     */
    public function getLeftUserId(): ?int
    {
        $action = $this->message->action;
        return ($action instanceof MessageActionChatDeleteUser) ? $action->userId : null;
    }

    /**
     * Get the new chat title.
     * @api
     */
    public function getNewTitle(): ?string
    {
        $action = $this->message->action;
        return ($action instanceof MessageActionChatEditTitle) ? $action->title : null;
    }

    /**
     * Get the ID of the pinned message.
     * Note: Service message about pin usually replies to the pinned message.
     * @api
     */
    public function getPinnedMessageId(): ?int
    {
        if (!$this->isPin()) {
            return null;
        }
        // In MTProto, service message for Pin usually has replyTo pointing to the pinned message.
        $reply = $this->message->replyTo;
        return ($reply instanceof MessageReplyHeader) ? $reply->replyToMsgId : null;
    }

    /**
     * Get the new channel ID if the chat was migrated.
     * @return int|null New Channel ID (if migrated to), or Old Chat ID (if migrated from).
     * @api
     */
    public function getMigrationId(): ?int
    {
        $action = $this->message->action;
        if ($action instanceof MessageActionChatMigrateTo) {
            return $action->channelId;
        }
        if ($action instanceof MessageActionChannelMigrateFrom) {
            return $action->chatId;
        }
        return null;
    }
}