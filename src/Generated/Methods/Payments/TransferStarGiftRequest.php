<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.transferStarGift
 */
final class TransferStarGiftRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7f18176a;
    
    public string $predicate = 'payments.transferStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.transferStarGift';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param AbstractInputPeer $toId
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly AbstractInputPeer $toId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();
        $buffer .= $this->toId->serialize();
        return $buffer;
    }
}