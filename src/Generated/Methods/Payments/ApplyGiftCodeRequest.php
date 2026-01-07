<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.applyGiftCode
 */
final class ApplyGiftCodeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf6e26854;
    
    public string $predicate = 'payments.applyGiftCode';
    
    public function getMethodName(): string
    {
        return 'payments.applyGiftCode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
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