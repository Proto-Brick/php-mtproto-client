<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/attachMenuBots
 */
final class AttachMenuBots extends AbstractAttachMenuBots
{
    public const CONSTRUCTOR_ID = 0x3c4301c0;
    
    public string $predicate = 'attachMenuBots';
    
    /**
     * @param int $hash
     * @param list<AttachMenuBot> $bots
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $bots,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->bots);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int64($stream);
        $bots = Deserializer::vectorOfObjects($stream, [AttachMenuBot::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $hash,
            $bots,
            $users
        );
    }
}