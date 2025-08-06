<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBusinessBotCallbackQuery
 */
final class UpdateBusinessBotCallbackQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1ea2fda7;
    
    public string $_ = 'updateBusinessBotCallbackQuery';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyToMessage !== null) $flags |= (1 << 2);
        if ($this->data !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->queryId);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->bytes($this->connectionId);
        $buffer .= $this->message->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyToMessage->serialize($serializer);
        }
        $buffer .= $serializer->int64($this->chatInstance);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->data);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $queryId = $deserializer->int64($stream);
        $userId = $deserializer->int64($stream);
        $connectionId = $deserializer->bytes($stream);
        $message = AbstractMessage::deserialize($deserializer, $stream);
        $replyToMessage = ($flags & (1 << 2)) ? AbstractMessage::deserialize($deserializer, $stream) : null;
        $chatInstance = $deserializer->int64($stream);
        $data = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
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