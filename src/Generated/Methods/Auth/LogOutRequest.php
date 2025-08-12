<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\LoggedOut;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.logOut
 */
final class LogOutRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3e72ba19;
    
    public string $predicate = 'auth.logOut';
    
    public function getMethodName(): string
    {
        return 'auth.logOut';
    }
    
    public function getResponseClass(): string
    {
        return LoggedOut::class;
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