<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGroupCallScheduled
 */
final class MessageActionGroupCallScheduled extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xb3a07661;
    
    public string $predicate = 'messageActionGroupCallScheduled';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param int $scheduleDate
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $scheduleDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int32($this->scheduleDate);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $call = AbstractInputGroupCall::deserialize($stream);
        $scheduleDate = Deserializer::int32($stream);

        return new self(
            $call,
            $scheduleDate
        );
    }
}