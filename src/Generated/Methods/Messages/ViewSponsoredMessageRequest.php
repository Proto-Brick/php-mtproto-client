<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.viewSponsoredMessage
 */
final class ViewSponsoredMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x269e3643;
    
    public string $predicate = 'messages.viewSponsoredMessage';
    
    public function getMethodName(): string
    {
        return 'messages.viewSponsoredMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $randomId
     */
    public function __construct(
        public readonly string $randomId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->randomId);
        return $buffer;
    }
}