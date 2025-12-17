<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotNewBusinessMessage
 */
final class UpdateBotNewBusinessMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9ddb347c;
    
    public string $predicate = 'updateBotNewBusinessMessage';
    
    /**
     * @param string $connectionId
     * @param AbstractMessage $message
     * @param int $qts
     * @param AbstractMessage|null $replyToMessage
     */
    public function __construct(
        public readonly string $connectionId,
        public readonly AbstractMessage $message,
        public readonly int $qts,
        public readonly ?AbstractMessage $replyToMessage = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyToMessage !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->connectionId);
        $buffer .= $this->message->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyToMessage->serialize();
        }
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $connectionId = Deserializer::bytes($__payload, $__offset);
        $message = AbstractMessage::deserialize($__payload, $__offset);
        $replyToMessage = (($flags & (1 << 0)) !== 0) ? AbstractMessage::deserialize($__payload, $__offset) : null;
        $qts = Deserializer::int32($__payload, $__offset);

        return new self(
            $connectionId,
            $message,
            $qts,
            $replyToMessage
        );
    }
}