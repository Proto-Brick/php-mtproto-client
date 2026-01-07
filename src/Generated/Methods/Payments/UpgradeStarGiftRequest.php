<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.upgradeStarGift
 */
final class UpgradeStarGiftRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xaed6e4f5;
    
    public string $predicate = 'payments.upgradeStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.upgradeStarGift';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param true|null $keepOriginalDetails
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly ?true $keepOriginalDetails = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->keepOriginalDetails) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->stargift->serialize();
        return $buffer;
    }
}