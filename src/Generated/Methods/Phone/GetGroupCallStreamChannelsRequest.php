<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCallStreamChannels;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.getGroupCallStreamChannels
 */
final class GetGroupCallStreamChannelsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1ab21940;
    
    public string $predicate = 'phone.getGroupCallStreamChannels';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCallStreamChannels';
    }
    
    public function getResponseClass(): string
    {
        return GroupCallStreamChannels::class;
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