<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/textPhone
 */
final class TextPhone extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x1ccb966a;
    
    public string $_ = 'textPhone';
    
    /**
     * @param AbstractRichText $text
     * @param string $phone
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $phone
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->phone);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $text = AbstractRichText::deserialize($stream);
        $phone = Deserializer::bytes($stream);
        return new self(
            $text,
            $phone
        );
    }
}