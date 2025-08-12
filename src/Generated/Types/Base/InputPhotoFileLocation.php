<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPhotoFileLocation
 */
final class InputPhotoFileLocation extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0x40181ffe;
    
    public string $predicate = 'inputPhotoFileLocation';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     * @param string $thumbSize
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference,
        public readonly string $thumbSize
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->fileReference);
        $buffer .= Serializer::bytes($this->thumbSize);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $fileReference = Deserializer::bytes($stream);
        $thumbSize = Deserializer::bytes($stream);

        return new self(
            $id,
            $accessHash,
            $fileReference,
            $thumbSize
        );
    }
}