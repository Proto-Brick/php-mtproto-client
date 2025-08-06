<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.tmpPassword
 */
final class TmpPassword extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdb64fd34;
    
    public string $_ = 'account.tmpPassword';
    
    /**
     * @param string $tmpPassword
     * @param int $validUntil
     */
    public function __construct(
        public readonly string $tmpPassword,
        public readonly int $validUntil
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->tmpPassword);
        $buffer .= $serializer->int32($this->validUntil);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $tmpPassword = $deserializer->bytes($stream);
        $validUntil = $deserializer->int32($stream);
        return new self(
            $tmpPassword,
            $validUntil
        );
    }
}