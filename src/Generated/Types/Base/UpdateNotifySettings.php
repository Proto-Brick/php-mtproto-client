<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateNotifySettings
 */
final class UpdateNotifySettings extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xbec268ef;
    
    public string $predicate = 'updateNotifySettings';
    
    /**
     * @param AbstractNotifyPeer $peer
     * @param PeerNotifySettings $notifySettings
     */
    public function __construct(
        public readonly AbstractNotifyPeer $peer,
        public readonly PeerNotifySettings $notifySettings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->notifySettings->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $peer = AbstractNotifyPeer::deserialize($__payload, $__offset);
        $notifySettings = PeerNotifySettings::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $notifySettings
        );
    }
}