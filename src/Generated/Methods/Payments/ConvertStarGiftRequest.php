<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.convertStarGift
 */
final class ConvertStarGiftRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x74bf076b;
    
    public string $predicate = 'payments.convertStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.convertStarGift';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputSavedStarGift $stargift
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();
        return $buffer;
    }
}