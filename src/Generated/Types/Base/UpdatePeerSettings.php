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
    public const CONSTRUCTOR_ID = 1786671974;
    
    public string $_ = 'updatePeerSettings';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractPeerSettings $settings
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractPeerSettings $settings
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->settings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $settings = AbstractPeerSettings::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $settings
        );
    }
}