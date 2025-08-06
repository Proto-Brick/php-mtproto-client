<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessGreetingMessage
 */
final class BusinessGreetingMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe519abab;
    
    public string $_ = 'businessGreetingMessage';
    
    /**
     * @param int $shortcutId
     * @param BusinessRecipients $recipients
     * @param int $noActivityDays
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly BusinessRecipients $recipients,
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $shortcutId = $deserializer->int32($stream);
        $recipients = BusinessRecipients::deserialize($deserializer, $stream);
        $noActivityDays = $deserializer->int32($stream);
        return new self(
            $shortcutId,
            $recipients,
            $noActivityDays
        );
    }
}