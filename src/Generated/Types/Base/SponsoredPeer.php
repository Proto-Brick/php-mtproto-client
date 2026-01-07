<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
        if ($this->sponsorInfo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->additionalInfo !== null) {
            $flags |= (1 << 1);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $randomId = Deserializer::bytes($__payload, $__offset);
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $sponsorInfo = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $additionalInfo = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $randomId,
            $peer,
            $sponsorInfo,
            $additionalInfo
        );
    }
}