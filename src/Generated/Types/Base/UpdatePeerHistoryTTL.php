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
    public const CONSTRUCTOR_ID = 0xbb9bb9a5;
    
    public string $predicate = 'updatePeerHistoryTTL';
    
    /**
     * @param AbstractPeer $peer
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ttlPeriod !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $peer = AbstractPeer::deserialize($stream);
        $ttlPeriod = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;

        return new self(
            $peer,
            $ttlPeriod
        );
    }
}