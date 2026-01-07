<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Fragment;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Fragment\CollectibleInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/fragment.getCollectibleInfo
 */
final class GetCollectibleInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbe1e85ba;
    
    public string $predicate = 'fragment.getCollectibleInfo';
    
    public function getMethodName(): string
    {
        return 'fragment.getCollectibleInfo';
    }
    
    public function getResponseClass(): string
    {
        return CollectibleInfo::class;
    }
    /**
     * @param AbstractInputCollectible $collectible
     */
    public function __construct(
        public readonly AbstractInputCollectible $collectible
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->collectible->serialize();
        return $buffer;
    }
}