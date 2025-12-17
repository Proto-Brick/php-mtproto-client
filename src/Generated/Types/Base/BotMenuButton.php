<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/botMenuButton
 */
final class BotMenuButton extends AbstractBotMenuButton
{
    public const CONSTRUCTOR_ID = 0xc7b57ce6;
    
    public string $predicate = 'botMenuButton';
    
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
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $text = Deserializer::bytes($__payload, $__offset);
        $url = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text,
            $url
        );
    }
}