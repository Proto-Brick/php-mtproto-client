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
    public const CONSTRUCTOR_ID = 1918567619;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->updates);
        $buffer .= $serializer->vectorOfObjects($this->users);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->seqStart);
        $buffer .= $serializer->int32($this->seq);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $updates = $deserializer->vectorOfObjects($stream, [AbstractUpdate::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $date = $deserializer->int32($stream);
        $seqStart = $deserializer->int32($stream);
        $seq = $deserializer->int32($stream);
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