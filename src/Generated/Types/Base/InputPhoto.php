<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPhoto
 */
final class InputPhoto extends AbstractInputPhoto
{
    public const CONSTRUCTOR_ID = 0x3bb3b94a;
    
    public string $_ = 'inputPhoto';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->bytes($this->fileReference);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
        $fileReference = $deserializer->bytes($stream);
        return new self(
            $id,
            $accessHash,
            $fileReference
        );
    }
}