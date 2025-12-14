<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/businessAwayMessage
 */
final class BusinessAwayMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0xef156a5c;
    
    public string $predicate = 'businessAwayMessage';
    
    /**
     * @param int $shortcutId
     * @param AbstractBusinessAwayMessageSchedule $schedule
     * @param BusinessRecipients $recipients
     * @param true|null $offlineOnly
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly AbstractBusinessAwayMessageSchedule $schedule,
        public readonly BusinessRecipients $recipients,
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
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $offlineOnly = (($flags & (1 << 0)) !== 0) ? true : null;
        $shortcutId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $schedule = AbstractBusinessAwayMessageSchedule::deserialize($stream);
        $recipients = BusinessRecipients::deserialize($stream);

        return new self(
            $shortcutId,
            $schedule,
            $recipients,
            $offlineOnly
        );
    }
}