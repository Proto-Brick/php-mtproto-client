<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageMedia;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.uploadImportedMedia
 */
final class UploadImportedMediaRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2a862092;
    
    public string $predicate = 'messages.uploadImportedMedia';
    
    public function getMethodName(): string
    {
        return 'messages.uploadImportedMedia';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessageMedia::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $importId
     * @param string $fileName
     * @param AbstractInputMedia $media
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $importId,
        public readonly string $fileName,
        public readonly AbstractInputMedia $media
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->importId);
        $buffer .= Serializer::bytes($this->fileName);
        $buffer .= $this->media->serialize();
        return $buffer;
    }
}