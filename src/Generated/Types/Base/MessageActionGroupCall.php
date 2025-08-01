<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGroupCall
 */
final class MessageActionGroupCall extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 2047704898;
    
    public string $_ = 'messageActionGroupCall';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param int|null $duration
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly ?int $duration = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->duration !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->call->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->duration);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $call = AbstractInputGroupCall::deserialize($deserializer, $stream);
        $duration = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
            return new self(
            $call,
            $duration
        );
    }
}