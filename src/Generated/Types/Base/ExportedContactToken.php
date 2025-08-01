<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/exportedContactToken
 */
final class ExportedContactToken extends AbstractExportedContactToken
{
    public const CONSTRUCTOR_ID = 1103040667;
    
    public string $_ = 'exportedContactToken';
    
    /**
     * @param string $url
     * @param int $expires
     */
    public function __construct(
        public readonly string $url,
        public readonly int $expires
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int32($this->expires);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $expires = $deserializer->int32($stream);
            return new self(
            $url,
            $expires
        );
    }
}