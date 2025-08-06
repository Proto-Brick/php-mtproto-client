<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputFileLocation
 */
final class InputFileLocation extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0xdfdaabe1;
    
    public string $_ = 'inputFileLocation';
    
    /**
     * @param int $volumeId
     * @param int $localId
     * @param int $secret
     * @param string $fileReference
     */
    public function __construct(
        public readonly int $volumeId,
        public readonly int $localId,
        public readonly int $secret,
        public readonly string $fileReference
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->volumeId);
        $buffer .= $serializer->int32($this->localId);
        $buffer .= $serializer->int64($this->secret);
        $buffer .= $serializer->bytes($this->fileReference);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $volumeId = $deserializer->int64($stream);
        $localId = $deserializer->int32($stream);
        $secret = $deserializer->int64($stream);
        $fileReference = $deserializer->bytes($stream);
        return new self(
            $volumeId,
            $localId,
            $secret,
            $fileReference
        );
    }
}