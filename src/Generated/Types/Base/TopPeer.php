<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/topPeer
 */
final class TopPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xedcdc05b;
    
    public string $predicate = 'topPeer';
    
    /**
     * @param AbstractPeer $peer
     * @param float $rating
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly float $rating
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= pack('d', $this->rating);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $peer = AbstractPeer::deserialize($stream);
        $rating = Deserializer::double($stream);

        return new self(
            $peer,
            $rating
        );
    }
}