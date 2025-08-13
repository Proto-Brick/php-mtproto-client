<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\CheckedGiftCode;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.checkGiftCode
 */
final class CheckGiftCodeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8e51b4c1;
    
    public string $predicate = 'payments.checkGiftCode';
    
    public function getMethodName(): string
    {
        return 'payments.checkGiftCode';
    }
    
    public function getResponseClass(): string
    {
        return CheckedGiftCode::class;
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