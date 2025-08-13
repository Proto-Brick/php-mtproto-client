<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Premium;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Premium\BoostsStatus;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/premium.getBoostsStatus
 */
final class GetBoostsStatusRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x42f1f61;
    
    public string $predicate = 'premium.getBoostsStatus';
    
    public function getMethodName(): string
    {
        return 'premium.getBoostsStatus';
    }
    
    public function getResponseClass(): string
    {
        return BoostsStatus::class;
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