<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Storage;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storage.fileUnknown
 */
final class FileUnknown extends AbstractFileType
{
    public const CONSTRUCTOR_ID = 2861972229;
    
    public string $_ = 'storage.fileUnknown';
    
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.

            return new self();
    }
}