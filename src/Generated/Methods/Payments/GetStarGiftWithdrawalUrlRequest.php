<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftWithdrawalUrl;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftWithdrawalUrl
 */
final class GetStarGiftWithdrawalUrlRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd06e93a8;
    
    public string $predicate = 'payments.getStarGiftWithdrawalUrl';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftWithdrawalUrl';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftWithdrawalUrl::class;
    }
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();
        $buffer .= $this->password->serialize();
        return $buffer;
    }
}