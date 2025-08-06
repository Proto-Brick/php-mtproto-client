<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.resetAuthorizations
 */
final class ResetAuthorizationsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9fab0d1a;
    
    public string $_ = 'auth.resetAuthorizations';
    
    public function getMethodName(): string
    {
        return 'auth.resetAuthorizations';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}