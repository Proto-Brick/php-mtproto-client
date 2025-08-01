<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/attachMenuBotsBot
 */
final class AttachMenuBotsBot extends AbstractAttachMenuBotsBot
{
    public const CONSTRUCTOR_ID = 2478794367;
    
    public string $_ = 'attachMenuBotsBot';
    
    /**
     * @param AbstractAttachMenuBot $bot
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AbstractAttachMenuBot $bot,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $bot = AbstractAttachMenuBot::deserialize($deserializer, $stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $bot,
            $users
        );
    }
}