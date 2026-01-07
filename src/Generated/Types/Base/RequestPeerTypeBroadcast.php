<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/requestPeerTypeBroadcast
 */
final class RequestPeerTypeBroadcast extends AbstractRequestPeerType
{
    public const CONSTRUCTOR_ID = 0x339bef6c;
    
    public string $predicate = 'requestPeerTypeBroadcast';
    
    /**
     * @param true|null $creator
     * @param bool|null $hasUsername
     * @param ChatAdminRights|null $userAdminRights
     * @param ChatAdminRights|null $botAdminRights
     */
    public function __construct(
        public readonly ?true $creator = null,
        public readonly ?bool $hasUsername = null,
        public readonly ?ChatAdminRights $userAdminRights = null,
        public readonly ?ChatAdminRights $botAdminRights = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) {
            $flags |= (1 << 0);
        }
        if ($this->hasUsername !== null) {
            $flags |= (1 << 3);
        }
        if ($this->userAdminRights !== null) {
            $flags |= (1 << 1);
        }
        if ($this->botAdminRights !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= ($this->hasUsername ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->userAdminRights->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->botAdminRights->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $creator = (($flags & (1 << 0)) !== 0) ? true : null;
        $hasUsername = (($flags & (1 << 3)) !== 0) ? (Deserializer::int32($__payload, $__offset) === 0x997275b5) : null;
        $userAdminRights = (($flags & (1 << 1)) !== 0) ? ChatAdminRights::deserialize($__payload, $__offset) : null;
        $botAdminRights = (($flags & (1 << 2)) !== 0) ? ChatAdminRights::deserialize($__payload, $__offset) : null;

        return new self(
            $creator,
            $hasUsername,
            $userAdminRights,
            $botAdminRights
        );
    }
}