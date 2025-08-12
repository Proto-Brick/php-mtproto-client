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
    
    public string $predicate = 'stickerKeyword';
    
    /**
     * @param int $documentId
     * @param list<string> $keyword
     */
    public function __construct(
        public readonly int $documentId,
        public readonly array $keyword
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->documentId);
        $buffer .= Serializer::vectorOfStrings($this->keyword);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $documentId = Deserializer::int64($stream);
        $keyword = Deserializer::vectorOfStrings($stream);

        return new self(
            $documentId,
            $keyword
        );
    }
}