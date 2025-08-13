<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sponsoredPeer
 */
final class SponsoredPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc69708d3;
    
    public string $predicate = 'sponsoredPeer';
    
    /**
     * @param string $randomId
     * @param AbstractPeer $peer
     * @param string|null $sponsorInfo
     * @param string|null $additionalInfo
     */
    public function __construct(
        public readonly string $randomId,
        public readonly AbstractPeer $peer,
        public readonly ?string $sponsorInfo = null,
        public readonly ?string $additionalInfo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sponsorInfo !== null) $flags |= (1 << 0);
        if ($this->additionalInfo !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->randomId);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->sponsorInfo);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->additionalInfo);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $randomId = Deserializer::bytes($stream);
        $peer = AbstractPeer::deserialize($stream);
        $sponsorInfo = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $additionalInfo = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;

        return new self(
            $randomId,
            $peer,
            $sponsorInfo,
            $additionalInfo
        );
    }
}