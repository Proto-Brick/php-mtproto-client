<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Upload;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/upload.cdnFile
 */
final class CdnFile extends AbstractCdnFile
{
    public const CONSTRUCTOR_ID = 0xa99fca4f;
    
    public string $_ = 'upload.cdnFile';
    
    /**
     * @param string $bytes
     */
    public function __construct(
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $bytes = Deserializer::bytes($stream);
        return new self(
            $bytes
        );
    }
}