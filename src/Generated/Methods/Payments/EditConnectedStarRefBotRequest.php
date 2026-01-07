<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ConnectedStarRefBots;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.editConnectedStarRefBot
 */
final class EditConnectedStarRefBotRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe4fca4a3;
    
    public string $predicate = 'payments.editConnectedStarRefBot';
    
    public function getMethodName(): string
    {
        return 'payments.editConnectedStarRefBot';
    }
    
    public function getResponseClass(): string
    {
        return ConnectedStarRefBots::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $link
     * @param true|null $revoked
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $link,
        public readonly ?true $revoked = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoked) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->link);
        return $buffer;
    }
}