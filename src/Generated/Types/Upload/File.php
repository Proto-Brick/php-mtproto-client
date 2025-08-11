<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Storage\AbstractFileType;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/upload.file
 */
final class File extends AbstractFile
{
    public const CONSTRUCTOR_ID = 0x96a18d5;
    
    public string $_ = 'upload.file';
    
    /**
     * @param AbstractFileType $type
     * @param int $mtime
     * @param string $bytes
     */
    public function __construct(
        public readonly AbstractFileType $type,
        public readonly int $mtime,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::int32($this->mtime);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $type = AbstractFileType::deserialize($stream);
        $mtime = Deserializer::int32($stream);
        $bytes = Deserializer::bytes($stream);
        return new self(
            $type,
            $mtime,
            $bytes
        );
    }
}