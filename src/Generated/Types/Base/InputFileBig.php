<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputFileBig
 */
final class InputFileBig extends AbstractInputFile
{
    public const CONSTRUCTOR_ID = 0xfa4f0bb5;
    
    public string $_ = 'inputFileBig';
    
    /**
     * @param int $id
     * @param int $parts
     * @param string $name
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly string $name
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int32($this->parts);
        $buffer .= $serializer->bytes($this->name);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $parts = $deserializer->int32($stream);
        $name = $deserializer->bytes($stream);
        return new self(
            $id,
            $parts,
            $name
        );
    }
}