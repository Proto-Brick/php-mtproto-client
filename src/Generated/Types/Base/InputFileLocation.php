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
    
    public string $predicate = 'inputFileLocation';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->volumeId);
        $buffer .= Serializer::int32($this->localId);
        $buffer .= Serializer::int64($this->secret);
        $buffer .= Serializer::bytes($this->fileReference);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $volumeId = Deserializer::int64($stream);
        $localId = Deserializer::int32($stream);
        $secret = Deserializer::int64($stream);
        $fileReference = Deserializer::bytes($stream);

        return new self(
            $volumeId,
            $localId,
            $secret,
            $fileReference
        );
    }
}