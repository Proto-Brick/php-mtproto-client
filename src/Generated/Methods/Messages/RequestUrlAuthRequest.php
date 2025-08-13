<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUrlAuthResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.requestUrlAuth
 */
final class RequestUrlAuthRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x198fb446;
    
    public string $predicate = 'messages.requestUrlAuth';
    
    public function getMethodName(): string
    {
        return 'messages.requestUrlAuth';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUrlAuthResult::class;
    }
    /**
     * @param AbstractInputPeer|null $peer
     * @param int|null $msgId
     * @param int|null $buttonId
     * @param string|null $url
     */
    public function __construct(
        public readonly ?AbstractInputPeer $peer = null,
        public readonly ?int $msgId = null,
        public readonly ?int $buttonId = null,
        public readonly ?string $url = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peer !== null) {
            $flags |= (1 << 1);
        }
        if ($this->msgId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->buttonId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->url !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->peer->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->msgId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->buttonId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->url);
        }
        return $buffer;
    }
}