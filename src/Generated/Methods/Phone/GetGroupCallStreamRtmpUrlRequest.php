<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCallStreamRtmpUrl;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.getGroupCallStreamRtmpUrl
 */
final class GetGroupCallStreamRtmpUrlRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5af4c73a;
    
    public string $predicate = 'phone.getGroupCallStreamRtmpUrl';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCallStreamRtmpUrl';
    }
    
    public function getResponseClass(): string
    {
        return GroupCallStreamRtmpUrl::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param bool $revoke
     * @param true|null $liveStory
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly bool $revoke,
        public readonly ?true $liveStory = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->liveStory) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= ($this->revoke ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}