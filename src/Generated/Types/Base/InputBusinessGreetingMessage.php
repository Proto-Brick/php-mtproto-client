<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputBusinessGreetingMessage
 */
final class InputBusinessGreetingMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0x194cb3b;
    
    public string $predicate = 'inputBusinessGreetingMessage';
    
    /**
     * @param int $shortcutId
     * @param InputBusinessRecipients $recipients
     * @param int $noActivityDays
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly InputBusinessRecipients $recipients,
        public readonly int $noActivityDays
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= $this->recipients->serialize();
        $buffer .= Serializer::int32($this->noActivityDays);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $shortcutId = Deserializer::int32($__payload, $__offset);
        $recipients = InputBusinessRecipients::deserialize($__payload, $__offset);
        $noActivityDays = Deserializer::int32($__payload, $__offset);

        return new self(
            $shortcutId,
            $recipients,
            $noActivityDays
        );
    }
}