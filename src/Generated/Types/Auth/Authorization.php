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
    public const CONSTRUCTOR_ID = 782418132;
    
    public string $_ = 'auth.authorization';
    
    /**
     * @param AbstractUser $user
     * @param bool|null $setupPasswordRequired
     * @param int|null $otherwiseReloginDays
     * @param int|null $tmpSessions
     * @param string|null $futureAuthToken
     */
    public function __construct(
        public readonly AbstractUser $user,
        public readonly ?bool $setupPasswordRequired = null,
        public readonly ?int $otherwiseReloginDays = null,
        public readonly ?int $tmpSessions = null,
        public readonly ?string $futureAuthToken = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->setupPasswordRequired) $flags |= (1 << 1);
        if ($this->otherwiseReloginDays !== null) $flags |= (1 << 1);
        if ($this->tmpSessions !== null) $flags |= (1 << 0);
        if ($this->futureAuthToken !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->otherwiseReloginDays);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->tmpSessions);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->futureAuthToken);
        }
        $buffer .= $this->user->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $setupPasswordRequired = ($flags & (1 << 1)) ? true : null;
        $otherwiseReloginDays = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $tmpSessions = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $futureAuthToken = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $user = AbstractUser::deserialize($deserializer, $stream);
            return new self(
            $user,
            $setupPasswordRequired,
            $otherwiseReloginDays,
            $tmpSessions,
            $futureAuthToken
        );
    }
}