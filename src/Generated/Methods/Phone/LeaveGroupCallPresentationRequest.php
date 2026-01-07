<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.leaveGroupCallPresentation
 */
final class LeaveGroupCallPresentationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1c50d144;
    
    public string $predicate = 'phone.leaveGroupCallPresentation';
    
    public function getMethodName(): string
    {
        return 'phone.leaveGroupCallPresentation';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        return $buffer;
    }
}