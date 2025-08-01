<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputUser
 */
final class InputUser extends AbstractInputUser
{
    public const CONSTRUCTOR_ID = 4061223110;
    
    public string $_ = 'inputUser';
    
    /**
     * @param int $userId
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $accessHash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int64($this->accessHash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
            return new self(
            $userId,
            $accessHash
        );
    }
}