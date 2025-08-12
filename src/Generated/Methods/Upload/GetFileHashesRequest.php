<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\FileHash;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/upload.getFileHashes
 */
final class GetFileHashesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9156982a;
    
    public string $predicate = 'upload.getFileHashes';
    
    public function getMethodName(): string
    {
        return 'upload.getFileHashes';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . FileHash::class . '>';
    }
    /**
     * @param AbstractInputFileLocation $location
     * @param int $offset
     */
    public function __construct(
        public readonly AbstractInputFileLocation $location,
        public readonly int $offset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->location->serialize();
        $buffer .= Serializer::int64($this->offset);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}