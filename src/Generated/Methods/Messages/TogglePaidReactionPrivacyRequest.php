<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPaidReactionPrivacy;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.togglePaidReactionPrivacy
 */
final class TogglePaidReactionPrivacyRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x435885b5;
    
    public string $predicate = 'messages.togglePaidReactionPrivacy';
    
    public function getMethodName(): string
    {
        return 'messages.togglePaidReactionPrivacy';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param AbstractPaidReactionPrivacy $private
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly AbstractPaidReactionPrivacy $private
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= $this->private->serialize();
        return $buffer;
    }
}