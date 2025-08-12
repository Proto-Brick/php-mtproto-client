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
    public const CONSTRUCTOR_ID = 0xf21158c6;
    
    public string $predicate = 'inputUser';
    
    /**
     * @param int $userId
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int64($this->accessHash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);

        return new self(
            $userId,
            $accessHash
        );
    }
}