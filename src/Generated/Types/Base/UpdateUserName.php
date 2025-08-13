<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateUserName
 */
final class UpdateUserName extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa7848924;
    
    public string $predicate = 'updateUserName';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);
        $buffer .= Serializer::vectorOfObjects($this->usernames);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = Deserializer::int64($stream);
        $firstName = Deserializer::bytes($stream);
        $lastName = Deserializer::bytes($stream);
        $usernames = Deserializer::vectorOfObjects($stream, [Username::class, 'deserialize']);

        return new self(
            $userId,
            $firstName,
            $lastName,
            $usernames
        );
    }
}