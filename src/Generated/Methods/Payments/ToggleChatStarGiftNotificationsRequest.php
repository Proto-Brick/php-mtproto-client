<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.toggleChatStarGiftNotifications
 */
final class ToggleChatStarGiftNotificationsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x60eaefa1;
    
    public string $predicate = 'payments.toggleChatStarGiftNotifications';
    
    public function getMethodName(): string
    {
        return 'payments.toggleChatStarGiftNotifications';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $enabled
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $enabled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->enabled) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}