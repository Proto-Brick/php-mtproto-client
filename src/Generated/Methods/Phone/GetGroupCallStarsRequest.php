<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCallStars;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.getGroupCallStars
 */
final class GetGroupCallStarsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6f636302;
    
    public string $predicate = 'phone.getGroupCallStars';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCallStars';
    }
    
    public function getResponseClass(): string
    {
        return GroupCallStars::class;
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