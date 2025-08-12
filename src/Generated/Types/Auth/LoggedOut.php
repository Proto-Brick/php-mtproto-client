<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.loggedOut
 */
final class LoggedOut extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc3a2835f;
    
    public string $predicate = 'auth.loggedOut';
    
    /**
     * @param string|null $futureAuthToken
     */
    public function __construct(
        public readonly ?string $futureAuthToken = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->futureAuthToken !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->futureAuthToken);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $futureAuthToken = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;

        return new self(
            $futureAuthToken
        );
    }
}