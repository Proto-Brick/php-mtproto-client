<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateUserName
 */
final class UpdateUserName extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa7848924;
    
    public string $_ = 'updateUserName';
    
    /**
     * @param int $userId
     * @param string $firstName
     * @param string $lastName
     * @param list<Username> $usernames
     */
    public function __construct(
        public readonly int $userId,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly array $usernames
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->bytes($this->firstName);
        $buffer .= $serializer->bytes($this->lastName);
        $buffer .= $serializer->vectorOfObjects($this->usernames);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $firstName = $deserializer->bytes($stream);
        $lastName = $deserializer->bytes($stream);
        $usernames = $deserializer->vectorOfObjects($stream, [Username::class, 'deserialize']);
        return new self(
            $userId,
            $firstName,
            $lastName,
            $usernames
        );
    }
}