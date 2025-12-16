<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/missingInvitee
 */
final class MissingInvitee extends TlObject
{
    public const CONSTRUCTOR_ID = 0x628c9224;
    
    public string $predicate = 'missingInvitee';
    
    /**
     * @param int $userId
     * @param true|null $premiumWouldAllowInvite
     * @param true|null $premiumRequiredForPm
     */
    public function __construct(
        public readonly int $userId,
        public readonly ?true $premiumWouldAllowInvite = null,
        public readonly ?true $premiumRequiredForPm = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premiumWouldAllowInvite) {
            $flags |= (1 << 0);
        }
        if ($this->premiumRequiredForPm) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $premiumWouldAllowInvite = (($flags & (1 << 0)) !== 0) ? true : null;
        $premiumRequiredForPm = (($flags & (1 << 1)) !== 0) ? true : null;
        $userId = Deserializer::int64($stream);

        return new self(
            $userId,
            $premiumWouldAllowInvite,
            $premiumRequiredForPm
        );
    }
}