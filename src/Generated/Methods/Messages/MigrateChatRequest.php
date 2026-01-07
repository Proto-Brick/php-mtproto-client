<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.migrateChat
 */
final class MigrateChatRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa2875319;
    
    public string $predicate = 'messages.migrateChat';
    
    public function getMethodName(): string
    {
        return 'messages.migrateChat';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $chatId
     */
    public function __construct(
        public readonly int $chatId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        return $buffer;
    }
}