<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/botBusinessConnection
 */
final class BotBusinessConnection extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8f34b2f5;
    
    public string $predicate = 'botBusinessConnection';
    
    /**
     * @param string $connectionId
     * @param int $userId
     * @param int $dcId
     * @param int $date
     * @param true|null $disabled
     * @param BusinessBotRights|null $rights
     */
    public function __construct(
        public readonly string $connectionId,
        public readonly int $userId,
        public readonly int $dcId,
        public readonly int $date,
        public readonly ?true $disabled = null,
        public readonly ?BusinessBotRights $rights = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->disabled) {
            $flags |= (1 << 1);
        }
        if ($this->rights !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->connectionId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= $this->rights->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $disabled = (($flags & (1 << 1)) !== 0) ? true : null;
        $connectionId = Deserializer::bytes($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $dcId = Deserializer::int32($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $rights = (($flags & (1 << 2)) !== 0) ? BusinessBotRights::deserialize($__payload, $__offset) : null;

        return new self(
            $connectionId,
            $userId,
            $dcId,
            $date,
            $disabled,
            $rights
        );
    }
}