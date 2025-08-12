<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contact
 */
final class Contact extends TlObject
{
    public const CONSTRUCTOR_ID = 0x145ade0b;
    
    public string $predicate = 'contact';
    
    /**
     * @param int $userId
     * @param bool $mutual
     */
    public function __construct(
        public readonly int $userId,
        public readonly bool $mutual
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= ($this->mutual ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $userId = Deserializer::int64($stream);
        $mutual = (Deserializer::int32($stream) === 0x997275b5);

        return new self(
            $userId,
            $mutual
        );
    }
}