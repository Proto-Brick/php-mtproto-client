<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updatePersonalChannel
 */
final class UpdatePersonalChannelRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd94305e0;
    
    public string $predicate = 'account.updatePersonalChannel';
    
    public function getMethodName(): string
    {
        return 'account.updatePersonalChannel';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     */
    public function __construct(
        public readonly AbstractInputChannel $channel
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        return $buffer;
    }
}