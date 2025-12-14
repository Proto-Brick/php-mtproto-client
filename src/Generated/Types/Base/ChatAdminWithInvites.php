<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $adminId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $invitesCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $revokedInvitesCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $adminId,
            $invitesCount,
            $revokedInvitesCount
        );
    }
}