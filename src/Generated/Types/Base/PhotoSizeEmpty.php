<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/photoSizeEmpty
 */
final class PhotoSizeEmpty extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 0xe17e23c;
    
    public string $_ = 'photoSizeEmpty';
    
    /**
     * @param string $type
     */
    public function __construct(
        public readonly string $type
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->type);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $type = Deserializer::bytes($stream);
        return new self(
            $type
        );
    }
}