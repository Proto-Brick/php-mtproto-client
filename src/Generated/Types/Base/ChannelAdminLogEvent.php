<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/channelAdminLogEvent
 */
final class ChannelAdminLogEvent extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1fad68cd;
    
    public string $predicate = 'channelAdminLogEvent';
    
    /**
     * @param int $id
     * @param int $date
     * @param int $userId
     * @param AbstractChannelAdminLogEventAction $action
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
        public readonly int $userId,
        public readonly AbstractChannelAdminLogEventAction $action
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= $this->action->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        $action = AbstractChannelAdminLogEventAction::deserialize($stream);

        return new self(
            $id,
            $date,
            $userId,
            $action
        );
    }
}