<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputWebFileLocation
 */
final class InputWebFileLocation extends AbstractInputWebFileLocation
{
    public const CONSTRUCTOR_ID = 3258570374;
    
    public string $_ = 'inputWebFileLocation';
    
    /**
     * @param string $url
     * @param int $accessHash
     */
    public function __construct(
        public readonly string $url,
        public readonly int $accessHash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int64($this->accessHash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $accessHash = $deserializer->int64($stream);
            return new self(
            $url,
            $accessHash
        );
    }
}