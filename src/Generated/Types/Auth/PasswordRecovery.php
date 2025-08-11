<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.passwordRecovery
 */
final class PasswordRecovery extends TlObject
{
    public const CONSTRUCTOR_ID = 0x137948a5;
    
    public string $_ = 'auth.passwordRecovery';
    
    /**
     * @param string $emailPattern
     */
    public function __construct(
        public readonly string $emailPattern
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emailPattern);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $emailPattern = Deserializer::bytes($stream);
        return new self(
            $emailPattern
        );
    }
}