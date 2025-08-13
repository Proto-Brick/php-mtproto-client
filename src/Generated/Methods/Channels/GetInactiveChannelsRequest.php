<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\InactiveChats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getInactiveChannels
 */
final class GetInactiveChannelsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x11e831ee;
    
    public string $predicate = 'channels.getInactiveChannels';
    
    public function getMethodName(): string
    {
        return 'channels.getInactiveChannels';
    }
    
    public function getResponseClass(): string
    {
        return InactiveChats::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}