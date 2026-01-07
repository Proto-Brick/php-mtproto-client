<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.editChatTitle
 */
final class EditChatTitleRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x73783ffd;
    
    public string $predicate = 'messages.editChatTitle';
    
    public function getMethodName(): string
    {
        return 'messages.editChatTitle';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $chatId
     * @param string $title
     */
    public function __construct(
        public readonly int $chatId,
        public readonly string $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= Serializer::bytes($this->title);
        return $buffer;
    }
}