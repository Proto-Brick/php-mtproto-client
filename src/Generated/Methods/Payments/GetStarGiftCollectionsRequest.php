<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractStarGiftCollections;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftCollections
 */
final class GetStarGiftCollectionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x981b91dd;
    
    public string $predicate = 'payments.getStarGiftCollections';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftCollections';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarGiftCollections::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}