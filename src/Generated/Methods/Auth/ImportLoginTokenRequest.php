<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractLoginToken;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.importLoginToken
 */
final class ImportLoginTokenRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x95ac5ce4;
    
    public string $predicate = 'auth.importLoginToken';
    
    public function getMethodName(): string
    {
        return 'auth.importLoginToken';
    }
    
    public function getResponseClass(): string
    {
        return AbstractLoginToken::class;
    }
    /**
     * @param string $token
     */
    public function __construct(
        public readonly string $token
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->token);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}