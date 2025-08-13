<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\InvitedUsers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.createChat
 */
final class CreateChatRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x92ceddd4;
    
    public string $predicate = 'messages.createChat';
    
    public function getMethodName(): string
    {
        return 'messages.createChat';
    }
    
    public function getResponseClass(): string
    {
        return InvitedUsers::class;
    }
    /**
     * @param list<AbstractInputUser> $users
     * @param string $title
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly array $users,
        public readonly string $title,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ttlPeriod !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }
        return $buffer;
    }
}