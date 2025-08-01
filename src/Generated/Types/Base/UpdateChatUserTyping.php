<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChatUserTyping
 */
final class UpdateChatUserTyping extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2202565360;
    
    public string $_ = 'updateChatUserTyping';
    
    /**
     * @param int $chatId
     * @param AbstractPeer $fromId
     * @param AbstractSendMessageAction $action
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractPeer $fromId,
        public readonly AbstractSendMessageAction $action
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $this->fromId->serialize($serializer);
        $buffer .= $this->action->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chatId = $deserializer->int64($stream);
        $fromId = AbstractPeer::deserialize($deserializer, $stream);
        $action = AbstractSendMessageAction::deserialize($deserializer, $stream);
            return new self(
            $chatId,
            $fromId,
            $action
        );
    }
}