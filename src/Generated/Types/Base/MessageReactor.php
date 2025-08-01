<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageReactor
 */
final class MessageReactor extends AbstractMessageReactor
{
    public const CONSTRUCTOR_ID = 1269016922;
    
    public string $_ = 'messageReactor';
    
    /**
     * @param int $count
     * @param bool|null $top
     * @param bool|null $my
     * @param bool|null $anonymous
     * @param AbstractPeer|null $peerId
     */
    public function __construct(
        public readonly int $count,
        public readonly ?bool $top = null,
        public readonly ?bool $my = null,
        public readonly ?bool $anonymous = null,
        public readonly ?AbstractPeer $peerId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->top) $flags |= (1 << 0);
        if ($this->my) $flags |= (1 << 1);
        if ($this->anonymous) $flags |= (1 << 2);
        if ($this->peerId !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 3)) {
            $buffer .= $this->peerId->serialize($serializer);
        }
        $buffer .= $serializer->int32($this->count);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $top = ($flags & (1 << 0)) ? true : null;
        $my = ($flags & (1 << 1)) ? true : null;
        $anonymous = ($flags & (1 << 2)) ? true : null;
        $peerId = ($flags & (1 << 3)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $count = $deserializer->int32($stream);
            return new self(
            $count,
            $top,
            $my,
            $anonymous,
            $peerId
        );
    }
}