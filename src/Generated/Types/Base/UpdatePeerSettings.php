<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $settings = PeerSettings::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $settings
        );
    }
}