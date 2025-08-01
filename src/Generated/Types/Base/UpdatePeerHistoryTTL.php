<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePeerHistoryTTL
 */
final class UpdatePeerHistoryTTL extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 3147544997;
    
    public string $_ = 'updatePeerHistoryTTL';
    
    /**
     * @param AbstractPeer $peer
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ttlPeriod !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->ttlPeriod);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $ttlPeriod = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
            return new self(
            $peer,
            $ttlPeriod
        );
    }
}