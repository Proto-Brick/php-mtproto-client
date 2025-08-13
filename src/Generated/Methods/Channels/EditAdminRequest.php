<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatAdminRights;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.editAdmin
 */
final class EditAdminRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd33c8902;
    
    public string $predicate = 'channels.editAdmin';
    
    public function getMethodName(): string
    {
        return 'channels.editAdmin';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputUser $userId
     * @param ChatAdminRights $adminRights
     * @param string $rank
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputUser $userId,
        public readonly ChatAdminRights $adminRights,
        public readonly string $rank
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->userId->serialize();
        $buffer .= $this->adminRights->serialize();
        $buffer .= Serializer::bytes($this->rank);
        return $buffer;
    }
}