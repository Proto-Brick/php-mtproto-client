<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatAdminWithInvites
 */
final class ChatAdminWithInvites extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf2ecef23;
    
    public string $_ = 'chatAdminWithInvites';
    
    /**
     * @param int $adminId
     * @param int $invitesCount
     * @param int $revokedInvitesCount
     */
    public function __construct(
        public readonly int $adminId,
        public readonly int $invitesCount,
        public readonly int $revokedInvitesCount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->adminId);
        $buffer .= $serializer->int32($this->invitesCount);
        $buffer .= $serializer->int32($this->revokedInvitesCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $adminId = $deserializer->int64($stream);
        $invitesCount = $deserializer->int32($stream);
        $revokedInvitesCount = $deserializer->int32($stream);
        return new self(
            $adminId,
            $invitesCount,
            $revokedInvitesCount
        );
    }
}