<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\UniqueStarGiftValueInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getUniqueStarGiftValueInfo
 */
final class GetUniqueStarGiftValueInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4365af6b;
    
    public string $predicate = 'payments.getUniqueStarGiftValueInfo';
    
    public function getMethodName(): string
    {
        return 'payments.getUniqueStarGiftValueInfo';
    }
    
    public function getResponseClass(): string
    {
        return UniqueStarGiftValueInfo::class;
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