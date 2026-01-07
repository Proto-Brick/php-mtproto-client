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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $userId = Deserializer::int64($__payload, $__offset);
        $firstName = Deserializer::bytes($__payload, $__offset);
        $lastName = Deserializer::bytes($__payload, $__offset);
        $usernames = Deserializer::vectorOfObjects($__payload, $__offset, [Username::class, 'deserialize']);

        return new self(
            $userId,
            $firstName,
            $lastName,
            $usernames
        );
    }
}