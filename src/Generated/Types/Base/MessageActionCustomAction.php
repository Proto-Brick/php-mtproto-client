<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionCustomAction
 */
final class MessageActionCustomAction extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xfae69f56;
    
    public string $predicate = 'messageActionCustomAction';
    
    /**
     * @param string $message
     */
    public function __construct(
        public readonly string $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->message);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $message = Deserializer::bytes($__payload, $__offset);

        return new self(
            $message
        );
    }
}