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
    
    public string $_ = 'contact';
    
    /**
     * @param int $userId
     * @param bool $mutual
     */
    public function __construct(
        public readonly int $userId,
        public readonly bool $mutual
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= ($this->mutual ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $userId = $deserializer->int64($stream);
        $mutual = ($deserializer->int32($stream) === 0x997275b5);
        return new self(
            $userId,
            $mutual
        );
    }
}