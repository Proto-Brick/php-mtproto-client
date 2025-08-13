<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\BotCallbackAnswer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getBotCallbackAnswer
 */
final class GetBotCallbackAnswerRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9342ca07;
    
    public string $predicate = 'messages.getBotCallbackAnswer';
    
    public function getMethodName(): string
    {
        return 'messages.getBotCallbackAnswer';
    }
    
    public function getResponseClass(): string
    {
        return BotCallbackAnswer::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param true|null $game
     * @param string|null $data
     * @param AbstractInputCheckPasswordSRP|null $password
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly ?true $game = null,
        public readonly ?string $data = null,
        public readonly ?AbstractInputCheckPasswordSRP $password = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->game) {
            $flags |= (1 << 1);
        }
        if ($this->data !== null) {
            $flags |= (1 << 0);
        }
        if ($this->password !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->data);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->password->serialize();
        }
        return $buffer;
    }
}