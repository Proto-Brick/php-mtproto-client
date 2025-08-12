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
    
    public string $predicate = 'account.tmpPassword';
    
    /**
     * @param string $tmpPassword
     * @param int $validUntil
     */
    public function __construct(
        public readonly string $tmpPassword,
        public readonly int $validUntil
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->tmpPassword);
        $buffer .= Serializer::int32($this->validUntil);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $tmpPassword = Deserializer::bytes($stream);
        $validUntil = Deserializer::int32($stream);

        return new self(
            $tmpPassword,
            $validUntil
        );
    }
}