<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.saveStarGift
 */
final class SaveStarGiftRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2a2a697c;
    
    public string $predicate = 'payments.saveStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.saveStarGift';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param true|null $unsave
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly ?true $unsave = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unsave) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->stargift->serialize();
        return $buffer;
    }
}