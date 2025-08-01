<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/contact
 */
final class Contact extends AbstractContact
{
    public const CONSTRUCTOR_ID = 341499403;
    
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $mutual = ($deserializer->int32($stream) === 0x997275b5);
            return new self(
            $userId,
            $mutual
        );
    }
}