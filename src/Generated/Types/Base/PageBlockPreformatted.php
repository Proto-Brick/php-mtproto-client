<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockPreformatted
 */
final class PageBlockPreformatted extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xc070d93e;
    
    public string $predicate = 'pageBlockPreformatted';
    
    /**
     * @param AbstractRichText $text
     * @param string $language
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $language
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->language);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $text = AbstractRichText::deserialize($stream);
        $language = Deserializer::bytes($stream);

        return new self(
            $text,
            $language
        );
    }
}