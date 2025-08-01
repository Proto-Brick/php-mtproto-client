<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/textUrl
 */
final class TextUrl extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 1009288385;
    
    public string $_ = 'textUrl';
    
    /**
     * @param AbstractRichText $text
     * @param string $url
     * @param int $webpageId
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $url,
        public readonly int $webpageId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize($serializer);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int64($this->webpageId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = AbstractRichText::deserialize($deserializer, $stream);
        $url = $deserializer->bytes($stream);
        $webpageId = $deserializer->int64($stream);
            return new self(
            $text,
            $url,
            $webpageId
        );
    }
}