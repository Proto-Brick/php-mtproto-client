<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/attachMenuBots
 */
final class AttachMenuBots extends AbstractAttachMenuBots
{
    public const CONSTRUCTOR_ID = 0x3c4301c0;
    
    public string $_ = 'attachMenuBots';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->bots);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int64($stream);
        $bots = $deserializer->vectorOfObjects($stream, [AttachMenuBot::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $hash,
            $bots,
            $users
        );
    }
}