<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotEditBusinessMessage
 */
final class UpdateBotEditBusinessMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7df587c;
    
    public string $predicate = 'updateBotEditBusinessMessage';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $connectionId = Deserializer::bytes($stream);
        $message = AbstractMessage::deserialize($stream);
        $replyToMessage = (($flags & (1 << 0)) !== 0) ? AbstractMessage::deserialize($stream) : null;
        $qts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $connectionId,
            $message,
            $qts,
            $replyToMessage
        );
    }
}