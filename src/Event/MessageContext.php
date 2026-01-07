<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Event;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Message;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageReplyHeader;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerUser;

/**
 * Context for user messages (Text, Media).
 *
 * @property-read Message $message The message object (type narrowed from AbstractMessage)
 * @api
 */
readonly class MessageContext extends AbstractMessageContext
{
    public function __construct(
        Client $client,
        Message $message // Type narrowing
    ) {
        parent::__construct($client, $message);
    }

    /**
     * Get the text content of the message.
     *
     * @return string
     * @api
     */
    public function getText(): string
    {
        return $this->message->message;
    }

    /**
     * Get the unique identifier of the message sender.
     *
     * This method automatically resolves the sender ID based on the chat type and direction:
     * - For groups/channels: Returns the explicit fromId.
     * - For private incoming messages: Returns the peerId (the other user).
     * - For outgoing messages: Returns the current user's ID.
     *
     * @return int|null Returns null if the sender cannot be determined (e.g., anonymous channels or system messages).
     * @api
     */
    public function getSenderId(): ?int
    {
        // 1. Explicit sender (Groups, Channels, or if provided)
        if ($this->message->fromId !== null) {
            return $this->message->fromId->getId();
        }

        // 2. Private Chat (Incoming): The sender is the Peer (the other user)
        if ($this->message->peerId instanceof PeerUser && !$this->message->out) {
            return $this->message->peerId->getId();
        }

        // 3. Private Chat (Outgoing): The sender is Me
        if ($this->message->out) {
            return $this->client->me?->id;
        }

        return null;
    }

    /**
     * Check if the message was sent by the current user.
     *
     * @return bool
     * @api
     */
    public function isOutgoing(): bool
    {
        return (bool)$this->message->out;
    }

    /**
     * Check if this message is a reply to another message.
     *
     * @return bool
     * @api
     */
    public function isReply(): bool
    {
        return $this->message->replyTo !== null;
    }

    /**
     * Get the ID of the message this message is replying to.
     *
     * @return int|null Returns null if this is not a reply.
     * @api
     */
    public function getReplyMessageId(): ?int
    {
        $replyHeader = $this->message->replyTo;

        if ($replyHeader instanceof MessageReplyHeader) {
            return $replyHeader->replyToMsgId;
        }

        return null;
    }

    /**
     * Forward this message to another chat.
     *
     * @param int|string $toPeer The target chat ID or Username.
     * @return void
     * @api
     */
    public function forwardTo(int|string $toPeer): void
    {
        $this->client->messages->forwardMessages(
            fromPeer: $this->getInputPeer(),
            id: [$this->message->id],
            toPeer: $toPeer,
            randomId: [random_int(1, PHP_INT_MAX)],
        );
    }

    /**
     * Edit the text of this message.
     *
     * Note: You can only edit your own outgoing messages.
     *
     * @param string $newText The new text content.
     * @return void
     * @api
     */
    public function edit(string $newText): void
    {
        if (!$this->isOutgoing()) {
            return;
        }
        $this->client->messages->editMessage(
            peer: $this->getInputPeer(),
            id: $this->message->id,
            message: $newText
        );
    }
}