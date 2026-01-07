<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ConnectedStarRefBots;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.connectStarRefBot
 */
final class ConnectStarRefBotRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7ed5348a;
    
    public string $predicate = 'payments.connectStarRefBot';
    
    public function getMethodName(): string
    {
        return 'payments.connectStarRefBot';
    }
    
    public function getResponseClass(): string
    {
        return ConnectedStarRefBots::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->bot->serialize();
        return $buffer;
    }
}