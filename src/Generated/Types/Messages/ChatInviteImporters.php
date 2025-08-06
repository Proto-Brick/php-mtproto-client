<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatInviteImporter;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.chatInviteImporters
 */
final class ChatInviteImporters extends TlObject
{
    public const CONSTRUCTOR_ID = 0x81b6b00a;
    
    public string $_ = 'messages.chatInviteImporters';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->importers);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $count = $deserializer->int32($stream);
        $importers = $deserializer->vectorOfObjects($stream, [ChatInviteImporter::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $count,
            $importers,
            $users
        );
    }
}