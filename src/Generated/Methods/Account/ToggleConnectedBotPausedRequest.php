<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.toggleConnectedBotPaused
 */
final class ToggleConnectedBotPausedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x646e1097;
    
    public string $predicate = 'account.toggleConnectedBotPaused';
    
    public function getMethodName(): string
    {
        return 'account.toggleConnectedBotPaused';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param bool $paused
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly bool $paused
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= ($this->paused ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}