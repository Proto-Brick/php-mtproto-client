<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBusinessBotCallbackQuery
 */
final class UpdateBusinessBotCallbackQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1ea2fda7;
    
    public string $predicate = 'updateBusinessBotCallbackQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param string $connectionId
     * @param AbstractMessage $message
     * @param int $chatInstance
     * @param AbstractMessage|null $replyToMessage
     * @param string|null $data
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly string $connectionId,
        public readonly AbstractMessage $message,
        public readonly int $chatInstance,
        public readonly ?AbstractMessage $replyToMessage = null,
        public readonly ?string $data = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyToMessage !== null) {
            $flags |= (1 << 2);
        }
        if ($this->data !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->connectionId);
        $buffer .= $this->message->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyToMessage->serialize();
        }
        $buffer .= Serializer::int64($this->chatInstance);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->data);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $queryId = Deserializer::int64($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $connectionId = Deserializer::bytes($__payload, $__offset);
        $message = AbstractMessage::deserialize($__payload, $__offset);
        $replyToMessage = (($flags & (1 << 2)) !== 0) ? AbstractMessage::deserialize($__payload, $__offset) : null;
        $chatInstance = Deserializer::int64($__payload, $__offset);
        $data = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $queryId,
            $userId,
            $connectionId,
            $message,
            $chatInstance,
            $replyToMessage,
            $data
        );
    }
}