<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChatDefaultBannedRights
 */
final class UpdateChatDefaultBannedRights extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 1421875280;
    
    public string $_ = 'updateChatDefaultBannedRights';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractChatBannedRights $defaultBannedRights
     * @param int $version
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractChatBannedRights $defaultBannedRights,
        public readonly int $version
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->defaultBannedRights->serialize($serializer);
        $buffer .= $serializer->int32($this->version);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $defaultBannedRights = AbstractChatBannedRights::deserialize($deserializer, $stream);
        $version = $deserializer->int32($stream);
            return new self(
            $peer,
            $defaultBannedRights,
            $version
        );
    }
}