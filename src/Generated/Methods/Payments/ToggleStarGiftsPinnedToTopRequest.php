<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.toggleStarGiftsPinnedToTop
 */
final class ToggleStarGiftsPinnedToTopRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1513e7b0;
    
    public string $predicate = 'payments.toggleStarGiftsPinnedToTop';
    
    public function getMethodName(): string
    {
        return 'payments.toggleStarGiftsPinnedToTop';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<AbstractInputSavedStarGift> $stargift
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $stargift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfObjects($this->stargift);
        return $buffer;
    }
}