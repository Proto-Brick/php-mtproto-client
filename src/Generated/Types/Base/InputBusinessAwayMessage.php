<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputBusinessAwayMessage
 */
final class InputBusinessAwayMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0x832175e0;
    
    public string $predicate = 'inputBusinessAwayMessage';
    
    /**
     * @param int $shortcutId
     * @param AbstractBusinessAwayMessageSchedule $schedule
     * @param InputBusinessRecipients $recipients
     * @param true|null $offlineOnly
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly AbstractBusinessAwayMessageSchedule $schedule,
        public readonly InputBusinessRecipients $recipients,
        public readonly ?true $offlineOnly = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->offlineOnly) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= $this->schedule->serialize();
        $buffer .= $this->recipients->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $offlineOnly = (($flags & (1 << 0)) !== 0) ? true : null;
        $shortcutId = Deserializer::int32($__payload, $__offset);
        $schedule = AbstractBusinessAwayMessageSchedule::deserialize($__payload, $__offset);
        $recipients = InputBusinessRecipients::deserialize($__payload, $__offset);

        return new self(
            $shortcutId,
            $schedule,
            $recipients,
            $offlineOnly
        );
    }
}