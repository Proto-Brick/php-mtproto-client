<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateGeoLiveViewed
 */
final class UpdateGeoLiveViewed extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x871fb939;
    
    public string $predicate = 'updateGeoLiveViewed';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $msgId = Deserializer::int32($stream);

        return new self(
            $peer,
            $msgId
        );
    }
}