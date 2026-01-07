<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\UniqueStarGift;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getUniqueStarGift
 */
final class GetUniqueStarGiftRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa1974d72;
    
    public string $predicate = 'payments.getUniqueStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.getUniqueStarGift';
    }
    
    public function getResponseClass(): string
    {
        return UniqueStarGift::class;
    }
    /**
     * @param string $slug
     */
    public function __construct(
        public readonly string $slug
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);
        return $buffer;
    }
}