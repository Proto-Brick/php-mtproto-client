<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotInlineResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InlineQueryPeerType;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.preparedInlineMessage
 */
final class PreparedInlineMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0xff57708d;
    
    public string $predicate = 'messages.preparedInlineMessage';
    
    /**
     * @param int $queryId
     * @param AbstractBotInlineResult $result
     * @param list<InlineQueryPeerType> $peerTypes
     * @param int $cacheTime
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $queryId,
        public readonly AbstractBotInlineResult $result,
        public readonly array $peerTypes,
        public readonly int $cacheTime,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= $this->result->serialize();
        $buffer .= Serializer::vectorOfObjects($this->peerTypes);
        $buffer .= Serializer::int32($this->cacheTime);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $queryId = Deserializer::int64($__payload, $__offset);
        $result = AbstractBotInlineResult::deserialize($__payload, $__offset);
        $peerTypes = Deserializer::vectorOfObjects($__payload, $__offset, [InlineQueryPeerType::class, 'deserialize']);
        $cacheTime = Deserializer::int32($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $queryId,
            $result,
            $peerTypes,
            $cacheTime,
            $users
        );
    }
}