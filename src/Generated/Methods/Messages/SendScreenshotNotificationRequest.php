<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendScreenshotNotification
 */
final class SendScreenshotNotificationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa1405817;
    
    public string $predicate = 'messages.sendScreenshotNotification';
    
    public function getMethodName(): string
    {
        return 'messages.sendScreenshotNotification';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputReplyTo $replyTo
     * @param int $randomId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputReplyTo $replyTo,
        public readonly int $randomId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->replyTo->serialize();
        $buffer .= Serializer::int64($this->randomId);
        return $buffer;
    }
}