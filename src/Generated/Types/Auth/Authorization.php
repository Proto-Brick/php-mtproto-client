<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.authorization
 */
final class Authorization extends AbstractAuthorization
{
    public const CONSTRUCTOR_ID = 0x2ea2c0d4;
    
    public string $predicate = 'auth.authorization';
    
    /**
     * @param AbstractUser $user
     * @param true|null $setupPasswordRequired
     * @param int|null $otherwiseReloginDays
     * @param int|null $tmpSessions
     * @param string|null $futureAuthToken
     */
    public function __construct(
        public readonly AbstractUser $user,
        public readonly ?true $setupPasswordRequired = null,
        public readonly ?int $otherwiseReloginDays = null,
        public readonly ?int $tmpSessions = null,
        public readonly ?string $futureAuthToken = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->setupPasswordRequired) $flags |= (1 << 1);
        if ($this->otherwiseReloginDays !== null) $flags |= (1 << 1);
        if ($this->tmpSessions !== null) $flags |= (1 << 0);
        if ($this->futureAuthToken !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->otherwiseReloginDays);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->tmpSessions);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->futureAuthToken);
        }
        $buffer .= $this->user->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $setupPasswordRequired = ($flags & (1 << 1)) ? true : null;
        $otherwiseReloginDays = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $tmpSessions = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $futureAuthToken = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $user = AbstractUser::deserialize($stream);

        return new self(
            $user,
            $setupPasswordRequired,
            $otherwiseReloginDays,
            $tmpSessions,
            $futureAuthToken
        );
    }
}