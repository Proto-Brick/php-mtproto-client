<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockKicker
 */
final class PageBlockKicker extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x1e148390;
    
    public string $predicate = 'pageBlockKicker';
    
    /**
     * @param AbstractRichText $text
     */
    public function __construct(
        public readonly AbstractRichText $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $text = AbstractRichText::deserialize($stream);

        return new self(
            $text
        );
    }
}