<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateNotifySettings
 */
final class UpdateNotifySettings extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 3200411887;
    
    public string $_ = 'updateNotifySettings';
    
    /**
     * @param AbstractNotifyPeer $peer
     * @param AbstractPeerNotifySettings $notifySettings
     */
    public function __construct(
        public readonly AbstractNotifyPeer $peer,
        public readonly AbstractPeerNotifySettings $notifySettings
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->notifySettings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractNotifyPeer::deserialize($deserializer, $stream);
        $notifySettings = AbstractPeerNotifySettings::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $notifySettings
        );
    }
}