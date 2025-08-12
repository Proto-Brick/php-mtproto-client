<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $shortcutId = Deserializer::int32($stream);
        $recipients = InputBusinessRecipients::deserialize($stream);
        $noActivityDays = Deserializer::int32($stream);

        return new self(
            $shortcutId,
            $recipients,
            $noActivityDays
        );
    }
}