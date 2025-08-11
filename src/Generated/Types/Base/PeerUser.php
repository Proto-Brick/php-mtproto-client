<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/peerUser
 */
final class PeerUser extends AbstractPeer
{
    public const CONSTRUCTOR_ID = 0x59511722;
    
    public string $_ = 'peerUser';
    
    /**
     * @param int $userId
     */
    public function __construct(
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $userId = Deserializer::int64($stream);
        return new self(
            $userId
        );
    }
}