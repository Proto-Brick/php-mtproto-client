<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Premium;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Premium\BoostsList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/premium.getUserBoosts
 */
final class GetUserBoostsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x39854d1f;
    
    public string $predicate = 'premium.getUserBoosts';
    
    public function getMethodName(): string
    {
        return 'premium.getUserBoosts';
    }
    
    public function getResponseClass(): string
    {
        return BoostsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}