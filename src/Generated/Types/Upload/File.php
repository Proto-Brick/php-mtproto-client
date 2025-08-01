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
    public const CONSTRUCTOR_ID = 157948117;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize($serializer);
        $buffer .= $serializer->int32($this->mtime);
        $buffer .= $serializer->bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $type = AbstractFileType::deserialize($deserializer, $stream);
        $mtime = $deserializer->int32($stream);
        $bytes = $deserializer->bytes($stream);
            return new self(
            $type,
            $mtime,
            $bytes
        );
    }
}