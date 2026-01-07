<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/keyboardButtonSimpleWebView
 */
final class KeyboardButtonSimpleWebView extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xa0c0505c;
    
    public string $predicate = 'keyboardButtonSimpleWebView';
    
    /**
     * @param string $text
     * @param string $url
     */
    public function __construct(
        public readonly string $text,
        public readonly string $url
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::bytes($this->url);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $text = Deserializer::bytes($__payload, $__offset);
        $url = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text,
            $url
        );
    }
}