<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessAwayMessage
 */
final class BusinessAwayMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0xef156a5c;
    
    public string $_ = 'businessAwayMessage';
    
    /**
     * @param int $shortcutId
     * @param AbstractBusinessAwayMessageSchedule $schedule
     * @param BusinessRecipients $recipients
     * @param bool|null $offlineOnly
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly AbstractBusinessAwayMessageSchedule $schedule,
        public readonly BusinessRecipients $recipients,
        public readonly ?bool $offlineOnly = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->offlineOnly) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->shortcutId);
        $buffer .= $this->schedule->serialize($serializer);
        $buffer .= $this->recipients->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $offlineOnly = ($flags & (1 << 0)) ? true : null;
        $shortcutId = $deserializer->int32($stream);
        $schedule = AbstractBusinessAwayMessageSchedule::deserialize($deserializer, $stream);
        $recipients = BusinessRecipients::deserialize($deserializer, $stream);
        return new self(
            $shortcutId,
            $schedule,
            $recipients,
            $offlineOnly
        );
    }
}