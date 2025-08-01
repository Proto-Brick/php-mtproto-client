<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatInvitePeek
 */
final class ChatInvitePeek extends AbstractChatInvite
{
    public const CONSTRUCTOR_ID = 1634294960;
    
    public string $_ = 'chatInvitePeek';
    
    /**
     * @param AbstractChat $chat
     * @param int $expires
     */
    public function __construct(
        public readonly AbstractChat $chat,
        public readonly int $expires
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chat->serialize($serializer);
        $buffer .= $serializer->int32($this->expires);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chat = AbstractChat::deserialize($deserializer, $stream);
        $expires = $deserializer->int32($stream);
            return new self(
            $chat,
            $expires
        );
    }
}