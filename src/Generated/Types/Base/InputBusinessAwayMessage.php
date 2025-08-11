<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBusinessAwayMessage
 */
final class InputBusinessAwayMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0x832175e0;
    
    public string $_ = 'inputBusinessAwayMessage';
    
    /**
     * @param int $shortcutId
     * @param AbstractBusinessAwayMessageSchedule $schedule
     * @param InputBusinessRecipients $recipients
     * @param bool|null $offlineOnly
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly AbstractBusinessAwayMessageSchedule $schedule,
        public readonly InputBusinessRecipients $recipients,
        public readonly ?bool $offlineOnly = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->offlineOnly) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= $this->schedule->serialize();
        $buffer .= $this->recipients->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $offlineOnly = ($flags & (1 << 0)) ? true : null;
        $shortcutId = Deserializer::int32($stream);
        $schedule = AbstractBusinessAwayMessageSchedule::deserialize($stream);
        $recipients = InputBusinessRecipients::deserialize($stream);
        return new self(
            $shortcutId,
            $schedule,
            $recipients,
            $offlineOnly
        );
    }
}