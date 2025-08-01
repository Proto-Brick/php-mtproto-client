<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputFile
 */
final class InputFile extends AbstractInputFile
{
    public const CONSTRUCTOR_ID = 4113560191;
    
    public string $_ = 'inputFile';
    
    /**
     * @param int $id
     * @param int $parts
     * @param string $name
     * @param string $md5Checksum
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly string $name,
        public readonly string $md5Checksum
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int32($this->parts);
        $buffer .= $serializer->bytes($this->name);
        $buffer .= $serializer->bytes($this->md5Checksum);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $parts = $deserializer->int32($stream);
        $name = $deserializer->bytes($stream);
        $md5Checksum = $deserializer->bytes($stream);
            return new self(
            $id,
            $parts,
            $name,
            $md5Checksum
        );
    }
}