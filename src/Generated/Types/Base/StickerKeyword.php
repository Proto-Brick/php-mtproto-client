<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerKeyword
 */
final class StickerKeyword extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfcfeb29c;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $documentId = $deserializer->int64($stream);
        $keyword = $deserializer->vectorOfStrings($stream);
        return new self(
            $documentId,
            $keyword
        );
    }
}