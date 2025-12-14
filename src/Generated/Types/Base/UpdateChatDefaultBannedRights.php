<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChatDefaultBannedRights
 */
final class UpdateChatDefaultBannedRights extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x54c01850;
    
    public string $predicate = 'updateChatDefaultBannedRights';
    
    /**
     * @param AbstractPeer $peer
     * @param ChatBannedRights $defaultBannedRights
     * @param int $version
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ChatBannedRights $defaultBannedRights,
        public readonly int $version
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->defaultBannedRights->serialize();
        $buffer .= Serializer::int32($this->version);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $defaultBannedRights = ChatBannedRights::deserialize($stream);
        $version = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $peer,
            $defaultBannedRights,
            $version
        );
    }
}