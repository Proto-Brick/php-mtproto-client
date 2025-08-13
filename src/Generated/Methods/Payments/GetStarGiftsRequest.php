<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractStarGifts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarGifts
 */
final class GetStarGiftsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc4563590;
    
    public string $predicate = 'payments.getStarGifts';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGifts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarGifts::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}