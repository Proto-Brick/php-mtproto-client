<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.saveDefaultSendAs
 */
final class SaveDefaultSendAsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4167add1;
    
    public string $predicate = 'phone.saveDefaultSendAs';
    
    public function getMethodName(): string
    {
        return 'phone.saveDefaultSendAs';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param AbstractInputPeer $sendAs
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly AbstractInputPeer $sendAs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= $this->sendAs->serialize();
        return $buffer;
    }
}