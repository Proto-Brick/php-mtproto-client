<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEncryptedFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputEncryptedFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedChat;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.uploadEncryptedFile
 */
final class UploadEncryptedFileRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5057c497;
    
    public string $predicate = 'messages.uploadEncryptedFile';
    
    public function getMethodName(): string
    {
        return 'messages.uploadEncryptedFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEncryptedFile::class;
    }
    /**
     * @param InputEncryptedChat $peer
     * @param AbstractInputEncryptedFile $file
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly AbstractInputEncryptedFile $file
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->file->serialize();
        return $buffer;
    }
}