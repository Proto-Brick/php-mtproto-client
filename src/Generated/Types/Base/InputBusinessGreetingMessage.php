<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBusinessGreetingMessage
 */
final class InputBusinessGreetingMessage extends AbstractInputBusinessGreetingMessage
{
    public const CONSTRUCTOR_ID = 26528571;
    
    public string $_ = 'inputBusinessGreetingMessage';
    
    /**
     * @param int $shortcutId
     * @param AbstractInputBusinessRecipients $recipients
     * @param int $noActivityDays
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly AbstractInputBusinessRecipients $recipients,
        public readonly int $noActivityDays
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->shortcutId);
        $buffer .= $this->recipients->serialize($serializer);
        $buffer .= $serializer->int32($this->noActivityDays);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $shortcutId = $deserializer->int32($stream);
        $recipients = AbstractInputBusinessRecipients::deserialize($deserializer, $stream);
        $noActivityDays = $deserializer->int32($stream);
            return new self(
            $shortcutId,
            $recipients,
            $noActivityDays
        );
    }
}