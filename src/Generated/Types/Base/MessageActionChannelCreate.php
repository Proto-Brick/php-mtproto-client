<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionChannelCreate
 */
final class MessageActionChannelCreate extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x95d2ac92;
    
    public string $predicate = 'messageActionChannelCreate';
    
    /**
     * @param string $title
     */
    public function __construct(
        public readonly string $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $title = Deserializer::bytes($__payload, $__offset);

        return new self(
            $title
        );
    }
}