<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.uniqueStarGift
 */
final class UniqueStarGift extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcaa2f60b;
    
    public string $predicate = 'payments.uniqueStarGift';
    
    /**
     * @param AbstractStarGift $gift
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->gift->serialize();
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $gift,
            $users
        );
    }
}