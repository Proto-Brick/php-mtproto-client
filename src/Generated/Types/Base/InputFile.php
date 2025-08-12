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
    public const CONSTRUCTOR_ID = 0xf52ff27f;
    
    public string $predicate = 'inputFile';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($this->parts);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= Serializer::bytes($this->md5Checksum);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int64($stream);
        $parts = Deserializer::int32($stream);
        $name = Deserializer::bytes($stream);
        $md5Checksum = Deserializer::bytes($stream);

        return new self(
            $id,
            $parts,
            $name,
            $md5Checksum
        );
    }
}