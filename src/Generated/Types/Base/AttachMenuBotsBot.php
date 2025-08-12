<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/attachMenuBotsBot
 */
final class AttachMenuBotsBot extends TlObject
{
    public const CONSTRUCTOR_ID = 0x93bf667f;
    
    public string $predicate = 'attachMenuBotsBot';
    
    /**
     * @param AttachMenuBot $bot
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AttachMenuBot $bot,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::vectorOfObjects($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $bot = AttachMenuBot::deserialize($stream);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $bot,
            $users
        );
    }
}