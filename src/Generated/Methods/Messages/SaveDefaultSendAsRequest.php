<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.saveDefaultSendAs
 */
final class SaveDefaultSendAsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xccfddf96;
    
    public string $predicate = 'messages.saveDefaultSendAs';
    
    public function getMethodName(): string
    {
        return 'messages.saveDefaultSendAs';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputPeer $sendAs
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputPeer $sendAs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->sendAs->serialize();
        return $buffer;
    }
}