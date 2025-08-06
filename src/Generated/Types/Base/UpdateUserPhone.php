<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateUserPhone
 */
final class UpdateUserPhone extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x5492a13;
    
    public string $_ = 'updateUserPhone';
    
    /**
     * @param int $userId
     * @param string $phone
     */
    public function __construct(
        public readonly int $userId,
        public readonly string $phone
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->bytes($this->phone);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $phone = $deserializer->bytes($stream);
        return new self(
            $userId,
            $phone
        );
    }
}