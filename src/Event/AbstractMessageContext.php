<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Event;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputReplyToMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionEmoji;

/**
 * Base context for any message event (Text or Service).
 */
abstract readonly class AbstractMessageContext
{
    public function __construct(
        public Client $client,
        public AbstractMessage $message
    ) {}

    // ==========================================
    // 1. LOCATION HELPERS
    // ==========================================

    /**
     * Get the unique identifier of the chat/group/channel.
     * @return int
     * @api
     */
    public function getChatId(): int
    {
        return $this->message->peerId->getId();
    }

    /**
     * Check if the message was sent in a private chat (User-to-User).
     *
     * @return bool
     * @api
     */
    public function isPrivate(): bool
    {
        return $this->message->peerId instanceof PeerUser;
    }

    /**
     * Check if the message was sent in a group or a channel.
     *
     * @return bool
     * @api
     */
    public function isGroup(): bool
    {
        return $this->message->peerId instanceof PeerChat || $this->message->peerId instanceof PeerChannel;
    }

    // ==========================================
    // 2. COMMON ACTIONS
    // ==========================================

    /**
     * Reply to this message with text.
     *
     * @param string $text The text to send.
     * @param bool $quote If true, quotes the original message.
     * @return void
     * @api
     */
    public function reply(string $text, bool $quote = true): void
    {
        $replyTo = $quote ? new InputReplyToMessage(replyToMsgId: $this->message->id) : null;

        $this->client->messages->sendMessage(
            peer: $this->getInputPeer(),
            message: $text,
            replyTo: $replyTo,
        );
    }

    /**
     * Delete this message.
     *
     * @param bool $revoke If true, deletes the message for everyone (if permissions allow).
     * @return void
     * @api
     */
    public function delete(bool $revoke = true): void
    {
        $this->client->messages->deleteMessages(
            id: [$this->message->id],
            revoke: $revoke
        );
    }

    /**
     * Pin this message in the chat.
     *
     * @param bool $notify If true, sends a notification to all chat members.
     * @return void
     * @api
     */
    public function pin(bool $notify = false): void
    {
        $this->client->messages->updatePinnedMessage(
            peer: $this->getInputPeer(),
            id: $this->message->id,
            silent: !$notify
        );
    }

    /**
     * Unpin this message from the chat.
     *
     * @return void
     * @api
     */
    public function unpin(): void
    {
        $this->client->messages->updatePinnedMessage(
            peer: $this->getInputPeer(),
            id: $this->message->id,
            unpin: true
        );
    }

    /**
     * Send a reaction (emoji) to this message.
     *
     * @param string $emoji The emoji character (e.g., "👍", "❤️").
     * @return void
     * @api
     */
    public function react(string $emoji): void
    {
        $this->client->messages->sendReaction(
            peer: $this->getInputPeer(),
            msgId: $this->message->id,
            reaction: [new ReactionEmoji($emoji)]
        );
    }

    /**
     * Mark this message (and all preceding ones) as read.
     *
     * @return void
     * @api
     */
    public function read(): void
    {
        $id = $this->message->id;
        $chatId = $this->getChatId();

        if ($this->message->peerId instanceof PeerChannel) {
            $this->client->channels->readHistory(channel: $chatId, maxId: $id);
        } else {
            $this->client->messages->readHistory(peer: $chatId, maxId: $id);
        }
    }

    /**
     * Helper to resolve the InputPeer for the current chat.
     *
     * @return AbstractInputPeer
     */
    protected function getInputPeer(): AbstractInputPeer
    {
        return $this->client->peerManager->resolve($this->getChatId());
    }
}