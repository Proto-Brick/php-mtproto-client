<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPhotoLegacyFileLocation
 */
final class InputPhotoLegacyFileLocation extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0xd83466f3;
    
    public string $_ = 'inputPhotoLegacyFileLocation';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     * @param int $volumeId
     * @param int $localId
     * @param int $secret
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference,
        public readonly int $volumeId,
        public readonly int $localId,
        public readonly int $secret
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->bytes($this->fileReference);
        $buffer .= $serializer->int64($this->volumeId);
        $buffer .= $serializer->int32($this->localId);
        $buffer .= $serializer->int64($this->secret);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
        $fileReference = $deserializer->bytes($stream);
        $volumeId = $deserializer->int64($stream);
        $localId = $deserializer->int32($stream);
        $secret = $deserializer->int64($stream);
        return new self(
            $id,
            $accessHash,
            $fileReference,
            $volumeId,
            $localId,
            $secret
        );
    }
}