<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messagePeerReaction
 */
final class MessagePeerReaction extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8c79b63c;
    
    public string $_ = 'messagePeerReaction';
    
    /**
     * @param AbstractPeer $peerId
     * @param int $date
     * @param AbstractReaction $reaction
     * @param bool|null $big
     * @param bool|null $unread
     * @param bool|null $my
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly int $date,
        public readonly AbstractReaction $reaction,
        public readonly ?bool $big = null,
        public readonly ?bool $unread = null,
        public readonly ?bool $my = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->big) $flags |= (1 << 0);
        if ($this->unread) $flags |= (1 << 1);
        if ($this->my) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peerId->serialize();
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->reaction->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $big = ($flags & (1 << 0)) ? true : null;
        $unread = ($flags & (1 << 1)) ? true : null;
        $my = ($flags & (1 << 2)) ? true : null;
        $peerId = AbstractPeer::deserialize($stream);
        $date = Deserializer::int32($stream);
        $reaction = AbstractReaction::deserialize($stream);
        return new self(
            $peerId,
            $date,
            $reaction,
            $big,
            $unread,
            $my
        );
    }
}