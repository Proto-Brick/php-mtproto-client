<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.setBoostsToUnblockRestrictions
 */
final class SetBoostsToUnblockRestrictionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xad399cee;
    
    public string $predicate = 'channels.setBoostsToUnblockRestrictions';
    
    public function getMethodName(): string
    {
        return 'channels.setBoostsToUnblockRestrictions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $boosts
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $boosts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->boosts);
        return $buffer;
    }
}