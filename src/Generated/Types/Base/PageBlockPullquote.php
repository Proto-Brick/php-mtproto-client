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
    
    public string $_ = 'pageBlockPullquote';
    
    /**
     * @param AbstractRichText $text
     * @param AbstractRichText $caption
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly AbstractRichText $caption
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize($serializer);
        $buffer .= $this->caption->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = AbstractRichText::deserialize($deserializer, $stream);
        $caption = AbstractRichText::deserialize($deserializer, $stream);
        return new self(
            $text,
            $caption
        );
    }
}