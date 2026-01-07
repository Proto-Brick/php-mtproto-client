<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ConnectedBotStarRef;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.connectedStarRefBots
 */
final class ConnectedStarRefBots extends TlObject
{
    public const CONSTRUCTOR_ID = 0x98d5ea1d;
    
    public string $predicate = 'payments.connectedStarRefBots';
    
    /**
     * @param int $count
     * @param list<ConnectedBotStarRef> $connectedBots
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $count,
        public readonly array $connectedBots,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->connectedBots);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $count = Deserializer::int32($__payload, $__offset);
        $connectedBots = Deserializer::vectorOfObjects($__payload, $__offset, [ConnectedBotStarRef::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $connectedBots,
            $users
        );
    }
}