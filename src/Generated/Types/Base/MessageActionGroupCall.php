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
    public const CONSTRUCTOR_ID = 0x7a0d7f42;
    
    public string $_ = 'messageActionGroupCall';
    
    /**
     * @param InputGroupCall $call
     * @param int|null $duration
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly ?int $duration = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->duration !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->call->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->duration);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $call = InputGroupCall::deserialize($stream);
        $duration = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        return new self(
            $call,
            $duration
        );
    }
}