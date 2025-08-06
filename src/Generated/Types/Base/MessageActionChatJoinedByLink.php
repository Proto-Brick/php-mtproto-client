<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionChatJoinedByLink
 */
final class MessageActionChatJoinedByLink extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x31224c3;
    
    public string $_ = 'messageActionChatJoinedByLink';
    
    /**
     * @param int $inviterId
     */
    public function __construct(
        public readonly int $inviterId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->inviterId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $inviterId = $deserializer->int64($stream);
        return new self(
            $inviterId
        );
    }
}