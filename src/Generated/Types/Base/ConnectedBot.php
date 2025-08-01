<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/connectedBot
 */
final class ConnectedBot extends AbstractConnectedBot
{
    public const CONSTRUCTOR_ID = 3171321345;
    
    public string $_ = 'connectedBot';
    
    /**
     * @param int $botId
     * @param AbstractBusinessBotRecipients $recipients
     * @param bool|null $canReply
     */
    public function __construct(
        public readonly int $botId,
        public readonly AbstractBusinessBotRecipients $recipients,
        public readonly ?bool $canReply = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canReply) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->botId);
        $buffer .= $this->recipients->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $canReply = ($flags & (1 << 0)) ? true : null;
        $botId = $deserializer->int64($stream);
        $recipients = AbstractBusinessBotRecipients::deserialize($deserializer, $stream);
            return new self(
            $botId,
            $recipients,
            $canReply
        );
    }
}