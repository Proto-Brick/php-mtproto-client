<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/myBoost
 */
final class MyBoost extends AbstractMyBoost
{
    public const CONSTRUCTOR_ID = 3293069660;
    
    public string $_ = 'myBoost';
    
    /**
     * @param int $slot
     * @param int $date
     * @param int $expires
     * @param AbstractPeer|null $peer
     * @param int|null $cooldownUntilDate
     */
    public function __construct(
        public readonly int $slot,
        public readonly int $date,
        public readonly int $expires,
        public readonly ?AbstractPeer $peer = null,
        public readonly ?int $cooldownUntilDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peer !== null) $flags |= (1 << 0);
        if ($this->cooldownUntilDate !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->slot);
        if ($flags & (1 << 0)) {
            $buffer .= $this->peer->serialize($serializer);
        }
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->expires);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->cooldownUntilDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $slot = $deserializer->int32($stream);
        $peer = ($flags & (1 << 0)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $date = $deserializer->int32($stream);
        $expires = $deserializer->int32($stream);
        $cooldownUntilDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $slot,
            $date,
            $expires,
            $peer,
            $cooldownUntilDate
        );
    }
}