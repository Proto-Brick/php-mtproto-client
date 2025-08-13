<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhoneCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.sendSignalingData
 */
final class SendSignalingDataRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xff7a9383;
    
    public string $predicate = 'phone.sendSignalingData';
    
    public function getMethodName(): string
    {
        return 'phone.sendSignalingData';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputPhoneCall $peer
     * @param string $data
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly string $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
}