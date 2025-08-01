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
    public const CONSTRUCTOR_ID = 3132089824;
    
    public string $_ = 'pageBlockAuthorDate';
    
    /**
     * @param AbstractRichText $author
     * @param int $publishedDate
     */
    public function __construct(
        public readonly AbstractRichText $author,
        public readonly int $publishedDate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->author->serialize($serializer);
        $buffer .= $serializer->int32($this->publishedDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $author = AbstractRichText::deserialize($deserializer, $stream);
        $publishedDate = $deserializer->int32($stream);
            return new self(
            $author,
            $publishedDate
        );
    }
}