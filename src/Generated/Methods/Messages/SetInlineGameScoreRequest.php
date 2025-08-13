<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputBotInlineMessageID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setInlineGameScore
 */
final class SetInlineGameScoreRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x15ad9f64;
    
    public string $predicate = 'messages.setInlineGameScore';
    
    public function getMethodName(): string
    {
        return 'messages.setInlineGameScore';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputBotInlineMessageID $id
     * @param AbstractInputUser $userId
     * @param int $score
     * @param true|null $editMessage
     * @param true|null $force
     */
    public function __construct(
        public readonly AbstractInputBotInlineMessageID $id,
        public readonly AbstractInputUser $userId,
        public readonly int $score,
        public readonly ?true $editMessage = null,
        public readonly ?true $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->editMessage) {
            $flags |= (1 << 0);
        }
        if ($this->force) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->id->serialize();
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->score);
        return $buffer;
    }
}