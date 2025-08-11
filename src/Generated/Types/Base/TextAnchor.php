<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/textAnchor
 */
final class TextAnchor extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x35553762;
    
    public string $_ = 'textAnchor';
    
    /**
     * @param AbstractRichText $text
     * @param string $name
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $name
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->name);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $text = AbstractRichText::deserialize($stream);
        $name = Deserializer::bytes($stream);
        return new self(
            $text,
            $name
        );
    }
}