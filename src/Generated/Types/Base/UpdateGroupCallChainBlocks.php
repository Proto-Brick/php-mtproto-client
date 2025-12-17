<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateGroupCallChainBlocks
 */
final class UpdateGroupCallChainBlocks extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa477288f;
    
    public string $predicate = 'updateGroupCallChainBlocks';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param int $subChainId
     * @param list<string> $blocks
     * @param int $nextOffset
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $subChainId,
        public readonly array $blocks,
        public readonly int $nextOffset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int32($this->subChainId);
        $buffer .= Serializer::vectorOfStrings($this->blocks);
        $buffer .= Serializer::int32($this->nextOffset);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $call = AbstractInputGroupCall::deserialize($__payload, $__offset);
        $subChainId = Deserializer::int32($__payload, $__offset);
        $blocks = Deserializer::vectorOfStrings($__payload, $__offset);
        $nextOffset = Deserializer::int32($__payload, $__offset);

        return new self(
            $call,
            $subChainId,
            $blocks,
            $nextOffset
        );
    }
}