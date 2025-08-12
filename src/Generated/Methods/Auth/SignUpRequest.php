<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractAuthorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.signUp
 */
final class SignUpRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xaac7b717;
    
    public string $predicate = 'auth.signUp';
    
    public function getMethodName(): string
    {
        return 'auth.signUp';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $firstName
     * @param string $lastName
     * @param true|null $noJoinedNotifications
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly ?true $noJoinedNotifications = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noJoinedNotifications) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}