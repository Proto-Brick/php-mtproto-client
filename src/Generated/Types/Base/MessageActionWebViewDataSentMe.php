<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionWebViewDataSentMe
 */
final class MessageActionWebViewDataSentMe extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x47dd8079;
    
    public string $predicate = 'messageActionWebViewDataSentMe';
    
    /**
     * @param string $text
     * @param string $data
     */
    public function __construct(
        public readonly string $text,
        public readonly string $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $text = Deserializer::bytes($__payload, $__offset);
        $data = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text,
            $data
        );
    }
}