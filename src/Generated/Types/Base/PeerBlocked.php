<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/peerBlocked
 */
final class PeerBlocked extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe8fd8014;
    
    public string $_ = 'peerBlocked';
    
    /**
     * @param AbstractPeer $peerId
     * @param int $date
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peerId->serialize();
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $peerId = AbstractPeer::deserialize($stream);
        $date = Deserializer::int32($stream);
        return new self(
            $peerId,
            $date
        );
    }
}