<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Upload\AbstractFile;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/upload.getFile
 */
final class GetFileRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbe5335be;
    
    public string $_ = 'upload.getFile';
    
    public function getMethodName(): string
    {
        return 'upload.getFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFile::class;
    }
    /**
     * @param AbstractInputFileLocation $location
     * @param int $offset
     * @param int $limit
     * @param bool|null $precise
     * @param bool|null $cdnSupported
     */
    public function __construct(
        public readonly AbstractInputFileLocation $location,
        public readonly int $offset,
        public readonly int $limit,
        public readonly ?bool $precise = null,
        public readonly ?bool $cdnSupported = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->precise) $flags |= (1 << 0);
        if ($this->cdnSupported) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->location->serialize($serializer);
        $buffer .= $serializer->int64($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}