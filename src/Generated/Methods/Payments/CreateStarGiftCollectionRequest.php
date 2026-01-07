<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftCollection;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.createStarGiftCollection
 */
final class CreateStarGiftCollectionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1f4a0e87;
    
    public string $predicate = 'payments.createStarGiftCollection';
    
    public function getMethodName(): string
    {
        return 'payments.createStarGiftCollection';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftCollection::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $title
     * @param list<AbstractInputSavedStarGift> $stargift
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $title,
        public readonly array $stargift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::vectorOfObjects($this->stargift);
        return $buffer;
    }
}