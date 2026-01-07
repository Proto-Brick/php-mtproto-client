<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.uploadRingtone
 */
final class UploadRingtoneRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x831a83a2;
    
    public string $predicate = 'account.uploadRingtone';
    
    public function getMethodName(): string
    {
        return 'account.uploadRingtone';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDocument::class;
    }
    /**
     * @param AbstractInputFile $file
     * @param string $fileName
     * @param string $mimeType
     */
    public function __construct(
        public readonly AbstractInputFile $file,
        public readonly string $fileName,
        public readonly string $mimeType
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->file->serialize();
        $buffer .= Serializer::bytes($this->fileName);
        $buffer .= Serializer::bytes($this->mimeType);
        return $buffer;
    }
}