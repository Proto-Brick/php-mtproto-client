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
    public const CONSTRUCTOR_ID = 0x5e068047;
    
    public string $predicate = 'pageListOrderedItemText';
    
    /**
     * @param string $num
     * @param AbstractRichText $text
     */
    public function __construct(
        public readonly string $num,
        public readonly AbstractRichText $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->num);
        $buffer .= $this->text->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $num = Deserializer::bytes($stream);
        $text = AbstractRichText::deserialize($stream);

        return new self(
            $num,
            $text
        );
    }
}