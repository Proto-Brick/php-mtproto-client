<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Base\Authorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.acceptLoginToken
 */
final class AcceptLoginTokenRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe894ad4d;
    
    public string $_ = 'auth.acceptLoginToken';
    
    public function getMethodName(): string
    {
        return 'auth.acceptLoginToken';
    }
    
    public function getResponseClass(): string
    {
        return Authorization::class;
    }
    /**
     * @param string $token
     */
    public function __construct(
        public readonly string $token
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->token);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}