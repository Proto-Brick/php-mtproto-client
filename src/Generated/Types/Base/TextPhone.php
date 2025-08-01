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
    public const CONSTRUCTOR_ID = 483104362;
    
    public string $_ = 'textPhone';
    
    /**
     * @param AbstractRichText $text
     * @param string $phone
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $phone
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize($serializer);
        $buffer .= $serializer->bytes($this->phone);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = AbstractRichText::deserialize($deserializer, $stream);
        $phone = $deserializer->bytes($stream);
            return new self(
            $text,
            $phone
        );
    }
}