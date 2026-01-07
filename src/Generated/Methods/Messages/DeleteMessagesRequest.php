<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deleteMessages
 */
final class DeleteMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe58e95d2;
    
    public string $predicate = 'messages.deleteMessages';
    
    public function getMethodName(): string
    {
        return 'messages.deleteMessages';
    }
    
    public function getResponseClass(): string
    {
        return AffectedMessages::class;
    }
    /**
     * @param list<int> $id
     * @param true|null $revoke
     */
    public function __construct(
        public readonly array $id,
        public readonly ?true $revoke = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoke) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfInts($this->id);
        return $buffer;
    }
}