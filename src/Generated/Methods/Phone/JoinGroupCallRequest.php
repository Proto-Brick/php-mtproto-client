<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.joinGroupCall
 */
final class JoinGroupCallRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8fb53057;
    
    public string $predicate = 'phone.joinGroupCall';
    
    public function getMethodName(): string
    {
        return 'phone.joinGroupCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param AbstractInputPeer $joinAs
     * @param array $params
     * @param true|null $muted
     * @param true|null $videoStopped
     * @param string|null $inviteHash
     * @param string|null $publicKey
     * @param string|null $block
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly AbstractInputPeer $joinAs,
        public readonly array $params,
        public readonly ?true $muted = null,
        public readonly ?true $videoStopped = null,
        public readonly ?string $inviteHash = null,
        public readonly ?string $publicKey = null,
        public readonly ?string $block = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->muted) {
            $flags |= (1 << 0);
        }
        if ($this->videoStopped) {
            $flags |= (1 << 2);
        }
        if ($this->inviteHash !== null) {
            $flags |= (1 << 1);
        }
        if ($this->publicKey !== null) {
            $flags |= (1 << 3);
        }
        if ($this->block !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= $this->joinAs->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->inviteHash);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int256($this->publicKey);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->block);
        }
        $buffer .= Serializer::serializeDataJSON($this->params);
        return $buffer;
    }
}