<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getAdminedPublicChannels
 */
final class GetAdminedPublicChannelsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf8b036af;
    
    public string $predicate = 'channels.getAdminedPublicChannels';
    
    public function getMethodName(): string
    {
        return 'channels.getAdminedPublicChannels';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    /**
     * @param true|null $byLocation
     * @param true|null $checkLimit
     * @param true|null $forPersonal
     */
    public function __construct(
        public readonly ?true $byLocation = null,
        public readonly ?true $checkLimit = null,
        public readonly ?true $forPersonal = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->byLocation) {
            $flags |= (1 << 0);
        }
        if ($this->checkLimit) {
            $flags |= (1 << 1);
        }
        if ($this->forPersonal) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
}