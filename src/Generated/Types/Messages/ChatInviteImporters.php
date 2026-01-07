<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatInviteImporter;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.chatInviteImporters
 */
final class ChatInviteImporters extends TlObject
{
    public const CONSTRUCTOR_ID = 0x81b6b00a;
    
    public string $predicate = 'messages.chatInviteImporters';
    
    /**
     * @param int $count
     * @param list<ChatInviteImporter> $importers
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $count,
        public readonly array $importers,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->importers);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $count = Deserializer::int32($__payload, $__offset);
        $importers = Deserializer::vectorOfObjects($__payload, $__offset, [ChatInviteImporter::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $importers,
            $users
        );
    }
}