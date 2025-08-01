<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageListOrderedItemText
 */
final class PageListOrderedItemText extends AbstractPageListOrderedItem
{
    public const CONSTRUCTOR_ID = 1577484359;
    
    public string $_ = 'pageListOrderedItemText';
    
    /**
     * @param string $num
     * @param AbstractRichText $text
     */
    public function __construct(
        public readonly string $num,
        public readonly AbstractRichText $text
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->num);
        $buffer .= $this->text->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $num = $deserializer->bytes($stream);
        $text = AbstractRichText::deserialize($deserializer, $stream);
            return new self(
            $num,
            $text
        );
    }
}