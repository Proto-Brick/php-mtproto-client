<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.hidePromoData
 */
final class HidePromoDataRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1e251c95;
    
    public string $predicate = 'help.hidePromoData';
    
    public function getMethodName(): string
    {
        return 'help.hidePromoData';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}