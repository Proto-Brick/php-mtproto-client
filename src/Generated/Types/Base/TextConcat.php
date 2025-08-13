<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/textConcat
 */
final class TextConcat extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x7e6260d7;
    
    public string $predicate = 'textConcat';
    
    /**
     * @param list<AbstractRichText> $texts
     */
    public function __construct(
        public readonly array $texts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->texts);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $texts = Deserializer::vectorOfObjects($stream, [AbstractRichText::class, 'deserialize']);

        return new self(
            $texts
        );
    }
}