<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\BankCardData;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getBankCardData
 */
final class GetBankCardDataRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2e79d779;
    
    public string $predicate = 'payments.getBankCardData';
    
    public function getMethodName(): string
    {
        return 'payments.getBankCardData';
    }
    
    public function getResponseClass(): string
    {
        return BankCardData::class;
    }
    /**
     * @param string $number
     */
    public function __construct(
        public readonly string $number
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->number);
        return $buffer;
    }
}