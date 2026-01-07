<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\InvitedUsers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.inviteToChannel
 */
final class InviteToChannelRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc9e33d54;
    
    public string $predicate = 'channels.inviteToChannel';
    
    public function getMethodName(): string
    {
        return 'channels.inviteToChannel';
    }
    
    public function getResponseClass(): string
    {
        return InvitedUsers::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<AbstractInputUser> $users
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
}