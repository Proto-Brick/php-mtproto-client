<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockPullquote
 */
final class PageBlockPullquote extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x4f4456d3;
    
    public string $predicate = 'pageBlockPullquote';
    
    /**
     * @param AbstractRichText $text
     * @param AbstractRichText $caption
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly AbstractRichText $caption
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= $this->caption->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $text = AbstractRichText::deserialize($stream);
        $caption = AbstractRichText::deserialize($stream);

        return new self(
            $text,
            $caption
        );
    }
}