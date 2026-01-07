<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGeoPoint;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.editLocation
 */
final class EditLocationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x58e63f6d;
    
    public string $predicate = 'channels.editLocation';
    
    public function getMethodName(): string
    {
        return 'channels.editLocation';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputGeoPoint $geoPoint
     * @param string $address
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly string $address
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->geoPoint->serialize();
        $buffer .= Serializer::bytes($this->address);
        return $buffer;
    }
}