<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/requestPeerTypeBroadcast
 */
final class RequestPeerTypeBroadcast extends AbstractRequestPeerType
{
    public const CONSTRUCTOR_ID = 0x339bef6c;
    
    public string $_ = 'requestPeerTypeBroadcast';
    
    /**
     * @param bool|null $creator
     * @param bool|null $hasUsername
     * @param ChatAdminRights|null $userAdminRights
     * @param ChatAdminRights|null $botAdminRights
     */
    public function __construct(
        public readonly ?bool $creator = null,
        public readonly ?bool $hasUsername = null,
        public readonly ?ChatAdminRights $userAdminRights = null,
        public readonly ?ChatAdminRights $botAdminRights = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) $flags |= (1 << 0);
        if ($this->hasUsername !== null) $flags |= (1 << 3);
        if ($this->userAdminRights !== null) $flags |= (1 << 1);
        if ($this->botAdminRights !== null) $flags |= (1 << 2);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $creator = ($flags & (1 << 0)) ? true : null;
        $hasUsername = ($flags & (1 << 3)) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $userAdminRights = ($flags & (1 << 1)) ? ChatAdminRights::deserialize($stream) : null;
        $botAdminRights = ($flags & (1 << 2)) ? ChatAdminRights::deserialize($stream) : null;
        return new self(
            $creator,
            $hasUsername,
            $userAdminRights,
            $botAdminRights
        );
    }
}