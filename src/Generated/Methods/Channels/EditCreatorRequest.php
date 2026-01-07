<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.editCreator
 */
final class EditCreatorRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8f38cd1f;
    
    public string $predicate = 'channels.editCreator';
    
    public function getMethodName(): string
    {
        return 'channels.editCreator';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputUser $userId
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputUser $userId,
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->userId->serialize();
        $buffer .= $this->password->serialize();
        return $buffer;
    }
}