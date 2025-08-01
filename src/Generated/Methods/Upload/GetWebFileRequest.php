<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWebFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Upload\AbstractWebFile;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/upload.getWebFile
 */
final class GetWebFileRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 619086221;
    
    public string $_ = 'upload.getWebFile';
    
    public function getMethodName(): string
    {
        return 'upload.getWebFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWebFile::class;
    }
    /**
     * @param AbstractInputWebFileLocation $location
     * @param int $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputWebFileLocation $location,
        public readonly int $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->location->serialize($serializer);
        $buffer .= $serializer->int32($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}