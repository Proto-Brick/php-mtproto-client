<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.checkRecoveryPassword
 */
final class CheckRecoveryPasswordRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd36bf79;
    
    public string $_ = 'auth.checkRecoveryPassword';
    
    public function getMethodName(): string
    {
        return 'auth.checkRecoveryPassword';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $code
     */
    public function __construct(
        public readonly string $code
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->code);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}