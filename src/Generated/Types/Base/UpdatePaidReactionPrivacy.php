<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePaidReactionPrivacy
 */
final class UpdatePaidReactionPrivacy extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8b725fce;
    
    public string $predicate = 'updatePaidReactionPrivacy';
    
    /**
     * @param AbstractPaidReactionPrivacy $private
     */
    public function __construct(
        public readonly AbstractPaidReactionPrivacy $private
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->private->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $private = AbstractPaidReactionPrivacy::deserialize($__payload, $__offset);

        return new self(
            $private
        );
    }
}