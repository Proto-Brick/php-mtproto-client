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
    public const CONSTRUCTOR_ID = 0xc239d686;
    
    public string $_ = 'inputWebFileLocation';
    
    /**
     * @param string $url
     * @param int $accessHash
     */
    public function __construct(
        public readonly string $url,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int64($this->accessHash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $url = Deserializer::bytes($stream);
        $accessHash = Deserializer::int64($stream);
        return new self(
            $url,
            $accessHash
        );
    }
}