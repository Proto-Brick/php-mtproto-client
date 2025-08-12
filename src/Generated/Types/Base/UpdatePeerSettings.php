<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePeerSettings
 */
final class UpdatePeerSettings extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x6a7e7366;
    
    public string $predicate = 'updatePeerSettings';
    
    /**
     * @param AbstractPeer $peer
     * @param PeerSettings $settings
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly PeerSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->settings->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $settings = PeerSettings::deserialize($stream);

        return new self(
            $peer,
            $settings
        );
    }
}