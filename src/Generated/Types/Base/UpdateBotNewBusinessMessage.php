<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotNewBusinessMessage
 */
final class UpdateBotNewBusinessMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9ddb347c;
    
    public string $_ = 'updateBotNewBusinessMessage';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyToMessage !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->connectionId);
        $buffer .= $this->message->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyToMessage->serialize($serializer);
        }
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $connectionId = $deserializer->bytes($stream);
        $message = AbstractMessage::deserialize($deserializer, $stream);
        $replyToMessage = ($flags & (1 << 0)) ? AbstractMessage::deserialize($deserializer, $stream) : null;
        $qts = $deserializer->int32($stream);
        return new self(
            $connectionId,
            $message,
            $qts,
            $replyToMessage
        );
    }
}