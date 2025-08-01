<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractConnectedBot;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.connectedBots
 */
final class ConnectedBots extends AbstractConnectedBots
{
    public const CONSTRUCTOR_ID = 400029819;
    
    public string $_ = 'account.connectedBots';
    
    /**
     * @param list<AbstractConnectedBot> $connectedBots
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $connectedBots,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->connectedBots);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $connectedBots = $deserializer->vectorOfObjects($stream, [AbstractConnectedBot::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $connectedBots,
            $users
        );
    }
}