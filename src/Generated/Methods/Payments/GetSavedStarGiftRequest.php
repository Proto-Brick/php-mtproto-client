<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\SavedStarGifts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getSavedStarGift
 */
final class GetSavedStarGiftRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb455a106;
    
    public string $predicate = 'payments.getSavedStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.getSavedStarGift';
    }
    
    public function getResponseClass(): string
    {
        return SavedStarGifts::class;
    }
    /**
     * @param list<AbstractInputSavedStarGift> $stargift
     */
    public function __construct(
        public readonly array $stargift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->stargift);
        return $buffer;
    }
}