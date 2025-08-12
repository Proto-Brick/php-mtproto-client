<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractSentCode;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.resetLoginEmail
 */
final class ResetLoginEmailRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7e960193;
    
    public string $predicate = 'auth.resetLoginEmail';
    
    public function getMethodName(): string
    {
        return 'auth.resetLoginEmail';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentCode::class;
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}