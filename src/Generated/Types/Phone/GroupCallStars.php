<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\GroupCallDonor;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/phone.groupCallStars
 */
final class GroupCallStars extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9d1dbd26;
    
    public string $predicate = 'phone.groupCallStars';
    
    /**
     * @param int $totalStars
     * @param list<GroupCallDonor> $topDonors
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $totalStars,
        public readonly array $topDonors,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->totalStars);
        $buffer .= Serializer::vectorOfObjects($this->topDonors);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $totalStars = Deserializer::int64($__payload, $__offset);
        $topDonors = Deserializer::vectorOfObjects($__payload, $__offset, [GroupCallDonor::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $totalStars,
            $topDonors,
            $chats,
            $users
        );
    }
}