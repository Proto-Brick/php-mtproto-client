<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\PasswordRecovery;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.requestPasswordRecovery
 */
final class RequestPasswordRecoveryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd897bc66;
    
    public string $predicate = 'auth.requestPasswordRecovery';
    
    public function getMethodName(): string
    {
        return 'auth.requestPasswordRecovery';
    }
    
    public function getResponseClass(): string
    {
        return PasswordRecovery::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}