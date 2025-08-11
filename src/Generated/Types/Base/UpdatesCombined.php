<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatesCombined
 */
final class UpdatesCombined extends AbstractUpdates
{
    public const CONSTRUCTOR_ID = 0x725b04c3;
    
    public string $_ = 'updatesCombined';
    
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $updates = Deserializer::vectorOfObjects($stream, [AbstractUpdate::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $date = Deserializer::int32($stream);
        $seqStart = Deserializer::int32($stream);
        $seq = Deserializer::int32($stream);
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