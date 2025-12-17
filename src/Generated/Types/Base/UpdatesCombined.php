<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatesCombined
 */
final class UpdatesCombined extends AbstractUpdates
{
    public const CONSTRUCTOR_ID = 0x725b04c3;
    
    public string $predicate = 'updatesCombined';
    
    /**
     * @param list<AbstractUpdate> $updates
     * @param list<AbstractUser> $users
     * @param list<AbstractChat> $chats
     * @param int $date
     * @param int $seqStart
     * @param int $seq
     */
    public function __construct(
        public readonly array $updates,
        public readonly array $users,
        public readonly array $chats,
        public readonly int $date,
        public readonly int $seqStart,
        public readonly int $seq
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->updates);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->seqStart);
        $buffer .= Serializer::int32($this->seq);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $updates = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUpdate::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $date = Deserializer::int32($__payload, $__offset);
        $seqStart = Deserializer::int32($__payload, $__offset);
        $seq = Deserializer::int32($__payload, $__offset);

        return new self(
            $updates,
            $users,
            $chats,
            $date,
            $seqStart,
            $seq
        );
    }
}