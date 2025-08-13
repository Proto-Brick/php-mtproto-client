<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.prolongWebView
 */
final class ProlongWebViewRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb0d81a83;
    
    public string $predicate = 'messages.prolongWebView';
    
    public function getMethodName(): string
    {
        return 'messages.prolongWebView';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $bot
     * @param int $queryId
     * @param true|null $silent
     * @param AbstractInputReplyTo|null $replyTo
     * @param AbstractInputPeer|null $sendAs
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $bot,
        public readonly int $queryId,
        public readonly ?true $silent = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?AbstractInputPeer $sendAs = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) {
            $flags |= (1 << 5);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->sendAs !== null) {
            $flags |= (1 << 13);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::int64($this->queryId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyTo->serialize();
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->sendAs->serialize();
        }
        return $buffer;
    }
}