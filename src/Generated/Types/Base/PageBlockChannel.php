<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockChannel
 */
final class PageBlockChannel extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xef1751b5;
    
    public string $predicate = 'pageBlockChannel';
    
    /**
     * @param AbstractChat $channel
     */
    public function __construct(
        public readonly AbstractChat $channel
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $channel = AbstractChat::deserialize($__payload, $__offset);

        return new self(
            $channel
        );
    }
}