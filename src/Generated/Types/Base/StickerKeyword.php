<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $documentId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $keyword = Deserializer::vectorOfStrings($stream);

        return new self(
            $documentId,
            $keyword
        );
    }
}