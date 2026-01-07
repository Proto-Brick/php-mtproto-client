<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getMessages
 */
final class GetMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x63c66506;
    
    public string $predicate = 'messages.getMessages';
    
    public function getMethodName(): string
    {
        return 'messages.getMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param list<AbstractInputMessage> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->id);
        return $buffer;
    }
}