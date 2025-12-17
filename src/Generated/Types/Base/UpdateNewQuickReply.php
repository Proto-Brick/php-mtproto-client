<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateNewQuickReply
 */
final class UpdateNewQuickReply extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf53da717;
    
    public string $predicate = 'updateNewQuickReply';
    
    /**
     * @param QuickReply $quickReply
     */
    public function __construct(
        public readonly QuickReply $quickReply
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->quickReply->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $quickReply = QuickReply::deserialize($__payload, $__offset);

        return new self(
            $quickReply
        );
    }
}