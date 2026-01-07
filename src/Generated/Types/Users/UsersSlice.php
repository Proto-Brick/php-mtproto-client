<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Users;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/users.usersSlice
 */
final class UsersSlice extends AbstractUsers
{
    public const CONSTRUCTOR_ID = 0x315a4974;
    
    public string $predicate = 'users.usersSlice';
    
    /**
     * @param int $count
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $count,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $count = Deserializer::int32($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $users
        );
    }
}