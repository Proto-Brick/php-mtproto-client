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
    public const CONSTRUCTOR_ID = 3228621118;
    
    public string $_ = 'pageBlockPreformatted';
    
    /**
     * @param AbstractRichText $text
     * @param string $language
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $language
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize($serializer);
        $buffer .= $serializer->bytes($this->language);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = AbstractRichText::deserialize($deserializer, $stream);
        $language = $deserializer->bytes($stream);
            return new self(
            $text,
            $language
        );
    }
}