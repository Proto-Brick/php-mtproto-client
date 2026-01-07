<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhoneCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.receivedCall
 */
final class ReceivedCallRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x17d54f61;
    
    public string $predicate = 'phone.receivedCall';
    
    public function getMethodName(): string
    {
        return 'phone.receivedCall';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputPhoneCall $peer
     */
    public function __construct(
        public readonly InputPhoneCall $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}