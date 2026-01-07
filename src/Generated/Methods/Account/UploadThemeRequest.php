<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.uploadTheme
 */
final class UploadThemeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1c3db333;
    
    public string $predicate = 'account.uploadTheme';
    
    public function getMethodName(): string
    {
        return 'account.uploadTheme';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDocument::class;
    }
    /**
     * @param AbstractInputFile $file
     * @param string $fileName
     * @param string $mimeType
     * @param AbstractInputFile|null $thumb
     */
    public function __construct(
        public readonly AbstractInputFile $file,
        public readonly string $fileName,
        public readonly string $mimeType,
        public readonly ?AbstractInputFile $thumb = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->thumb !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->file->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->thumb->serialize();
        }
        $buffer .= Serializer::bytes($this->fileName);
        $buffer .= Serializer::bytes($this->mimeType);
        return $buffer;
    }
}