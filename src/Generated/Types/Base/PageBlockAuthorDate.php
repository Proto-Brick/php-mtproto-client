<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockAuthorDate
 */
final class PageBlockAuthorDate extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xbaafe5e0;
    
    public string $_ = 'pageBlockAuthorDate';
    
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $author = AbstractRichText::deserialize($stream);
        $publishedDate = Deserializer::int32($stream);
        return new self(
            $author,
            $publishedDate
        );
    }
}