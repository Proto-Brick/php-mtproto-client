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
    
    public string $predicate = 'chatAdminWithInvites';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->adminId);
        $buffer .= Serializer::int32($this->invitesCount);
        $buffer .= Serializer::int32($this->revokedInvitesCount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $adminId = Deserializer::int64($stream);
        $invitesCount = Deserializer::int32($stream);
        $revokedInvitesCount = Deserializer::int32($stream);

        return new self(
            $adminId,
            $invitesCount,
            $revokedInvitesCount
        );
    }
}