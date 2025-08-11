<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/myBoost
 */
final class MyBoost extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc448415c;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peer !== null) $flags |= (1 << 0);
        if ($this->cooldownUntilDate !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->slot);
        if ($flags & (1 << 0)) {
            $buffer .= $this->peer->serialize();
        }
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->expires);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->cooldownUntilDate);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $slot = Deserializer::int32($stream);
        $peer = ($flags & (1 << 0)) ? AbstractPeer::deserialize($stream) : null;
        $date = Deserializer::int32($stream);
        $expires = Deserializer::int32($stream);
        $cooldownUntilDate = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        return new self(
            $slot,
            $date,
            $expires,
            $peer,
            $cooldownUntilDate
        );
    }
}