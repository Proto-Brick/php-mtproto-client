<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerPack
 */
final class StickerPack extends AbstractStickerPack
{
    public const CONSTRUCTOR_ID = 313694676;
    
    public string $_ = 'stickerPack';
    
    /**
     * @param string $emoticon
     * @param list<int> $documents
     */
    public function __construct(
        public readonly string $emoticon,
        public readonly array $documents
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->emoticon);
        $buffer .= $serializer->vectorOfLongs($this->documents);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $emoticon = $deserializer->bytes($stream);
        $documents = $deserializer->vectorOfLongs($stream);
            return new self(
            $emoticon,
            $documents
        );
    }
}