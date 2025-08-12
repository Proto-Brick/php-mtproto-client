<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractExportedChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.exportedChatInvites
 */
final class ExportedChatInvites extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbdc62dcc;
    
    public string $predicate = 'messages.exportedChatInvites';
    
    /**
     * @param int $count
     * @param list<AbstractExportedChatInvite> $invites
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $count,
        public readonly array $invites,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->invites);
        $buffer .= Serializer::vectorOfObjects($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $count = Deserializer::int32($stream);
        $invites = Deserializer::vectorOfObjects($stream, [AbstractExportedChatInvite::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $invites,
            $users
        );
    }
}