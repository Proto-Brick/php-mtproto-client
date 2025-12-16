<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/textUrl
 */
final class TextUrl extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x3c2884c1;
    
    public string $predicate = 'textUrl';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int64($this->webpageId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $text = AbstractRichText::deserialize($stream);
        $url = Deserializer::bytes($stream);
        $webpageId = Deserializer::int64($stream);

        return new self(
            $text,
            $url,
            $webpageId
        );
    }
}