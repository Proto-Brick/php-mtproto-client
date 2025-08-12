<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageReactor
 */
final class MessageReactor extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4ba3a95a;
    
    public string $predicate = 'messageReactor';
    
    /**
     * @param int $count
     * @param true|null $top
     * @param true|null $my
     * @param true|null $anonymous
     * @param AbstractPeer|null $peerId
     */
    public function __construct(
        public readonly int $count,
        public readonly ?true $top = null,
        public readonly ?true $my = null,
        public readonly ?true $anonymous = null,
        public readonly ?AbstractPeer $peerId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->top) $flags |= (1 << 0);
        if ($this->my) $flags |= (1 << 1);
        if ($this->anonymous) $flags |= (1 << 2);
        if ($this->peerId !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= $this->peerId->serialize();
        }
        $buffer .= Serializer::int32($this->count);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $top = ($flags & (1 << 0)) ? true : null;
        $my = ($flags & (1 << 1)) ? true : null;
        $anonymous = ($flags & (1 << 2)) ? true : null;
        $peerId = ($flags & (1 << 3)) ? AbstractPeer::deserialize($stream) : null;
        $count = Deserializer::int32($stream);

        return new self(
            $count,
            $top,
            $my,
            $anonymous,
            $peerId
        );
    }
}