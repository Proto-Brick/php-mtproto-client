<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelAdminLogEvent;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/channels.adminLogResults
 */
final class AdminLogResults extends TlObject
{
    public const CONSTRUCTOR_ID = 0xed8af74d;
    
    public string $predicate = 'channels.adminLogResults';
    
    /**
     * @param list<ChannelAdminLogEvent> $events
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $events,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->events);
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
        $events = Deserializer::vectorOfObjects($__payload, $__offset, [ChannelAdminLogEvent::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $events,
            $chats,
            $users
        );
    }
}