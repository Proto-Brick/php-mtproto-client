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
    
    public string $predicate = 'inputPhotoLegacyFileLocation';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->fileReference);
        $buffer .= Serializer::int64($this->volumeId);
        $buffer .= Serializer::int32($this->localId);
        $buffer .= Serializer::int64($this->secret);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $fileReference = Deserializer::bytes($stream);
        $volumeId = Deserializer::int64($stream);
        $localId = Deserializer::int32($stream);
        $secret = Deserializer::int64($stream);

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