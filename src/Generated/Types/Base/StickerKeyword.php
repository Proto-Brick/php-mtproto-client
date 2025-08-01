<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerKeyword
 */
final class StickerKeyword extends AbstractStickerKeyword
{
    public const CONSTRUCTOR_ID = 4244550300;
    
    public string $_ = 'stickerKeyword';
    
    /**
     * @param int $documentId
     * @param list<string> $keyword
     */
    public function __construct(
        public readonly int $documentId,
        public readonly array $keyword
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->documentId);
        $buffer .= $serializer->vectorOfStrings($this->keyword);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $documentId = $deserializer->int64($stream);
        $keyword = $deserializer->vectorOfStrings($stream);
            return new self(
            $documentId,
            $keyword
        );
    }
}