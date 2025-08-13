<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MissingInvitee;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.invitedUsers
 */
final class InvitedUsers extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7f5defa6;
    
    public string $predicate = 'messages.invitedUsers';
    
    /**
     * @param AbstractUpdates $updates
     * @param list<MissingInvitee> $missingInvitees
     */
    public function __construct(
        public readonly AbstractUpdates $updates,
        public readonly array $missingInvitees
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->updates->serialize();
        $buffer .= Serializer::vectorOfObjects($this->missingInvitees);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $updates = AbstractUpdates::deserialize($stream);
        $missingInvitees = Deserializer::vectorOfObjects($stream, [MissingInvitee::class, 'deserialize']);

        return new self(
            $updates,
            $missingInvitees
        );
    }
}