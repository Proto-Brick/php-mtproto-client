<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockAuthorDate
 */
final class PageBlockAuthorDate extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xbaafe5e0;
    
    public string $predicate = 'pageBlockAuthorDate';
    
    /**
     * @param AbstractRichText $author
     * @param int $publishedDate
     */
    public function __construct(
        public readonly AbstractRichText $author,
        public readonly int $publishedDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->author->serialize();
        $buffer .= Serializer::int32($this->publishedDate);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $author = AbstractRichText::deserialize($stream);
        $publishedDate = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $author,
            $publishedDate
        );
    }
}