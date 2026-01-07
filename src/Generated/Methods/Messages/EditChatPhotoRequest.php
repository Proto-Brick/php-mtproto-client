<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChatPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.editChatPhoto
 */
final class EditChatPhotoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x35ddd674;
    
    public string $predicate = 'messages.editChatPhoto';
    
    public function getMethodName(): string
    {
        return 'messages.editChatPhoto';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $chatId
     * @param AbstractInputChatPhoto $photo
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractInputChatPhoto $photo
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= $this->photo->serialize();
        return $buffer;
    }
}