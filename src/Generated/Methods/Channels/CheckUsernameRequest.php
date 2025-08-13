<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.checkUsername
 */
final class CheckUsernameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x10e6bd2c;
    
    public string $predicate = 'channels.checkUsername';
    
    public function getMethodName(): string
    {
        return 'channels.checkUsername';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param string $username
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly string $username
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::bytes($this->username);
        return $buffer;
    }
}