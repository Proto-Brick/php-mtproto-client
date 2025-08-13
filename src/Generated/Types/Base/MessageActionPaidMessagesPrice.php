<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionPaidMessagesPrice
 */
final class MessageActionPaidMessagesPrice extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x84b88578;
    
    public string $predicate = 'messageActionPaidMessagesPrice';
    
    /**
     * @param int $stars
     * @param true|null $broadcastMessagesAllowed
     */
    public function __construct(
        public readonly int $stars,
        public readonly ?true $broadcastMessagesAllowed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcastMessagesAllowed) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->stars);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $broadcastMessagesAllowed = ($flags & (1 << 0)) ? true : null;
        $stars = Deserializer::int64($stream);

        return new self(
            $stars,
            $broadcastMessagesAllowed
        );
    }
}