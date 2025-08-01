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
    public const CONSTRUCTOR_ID = 3013637729;
    
    public string $_ = 'messageActionGroupCallScheduled';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param int $scheduleDate
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $scheduleDate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->int32($this->scheduleDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $call = AbstractInputGroupCall::deserialize($deserializer, $stream);
        $scheduleDate = $deserializer->int32($stream);
            return new self(
            $call,
            $scheduleDate
        );
    }
}