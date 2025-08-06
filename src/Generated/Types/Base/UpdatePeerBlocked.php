<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePeerBlocked
 */
final class UpdatePeerBlocked extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xebe07752;
    
    public string $_ = 'updatePeerBlocked';
    
    /**
     * @param AbstractPeer $peerId
     * @param bool|null $blocked
     * @param bool|null $blockedMyStoriesFrom
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly ?bool $blocked = null,
        public readonly ?bool $blockedMyStoriesFrom = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->blocked) $flags |= (1 << 0);
        if ($this->blockedMyStoriesFrom) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peerId->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $blocked = ($flags & (1 << 0)) ? true : null;
        $blockedMyStoriesFrom = ($flags & (1 << 1)) ? true : null;
        $peerId = AbstractPeer::deserialize($deserializer, $stream);
        return new self(
            $peerId,
            $blocked,
            $blockedMyStoriesFrom
        );
    }
}