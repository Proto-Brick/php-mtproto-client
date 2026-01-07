<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoicePremiumGiftStars
 */
final class InputInvoicePremiumGiftStars extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0xdabab2ef;
    
    public string $predicate = 'inputInvoicePremiumGiftStars';
    
    /**
     * @param AbstractInputUser $userId
     * @param int $months
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $months,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->message !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->months);
        if ($flags & (1 << 0)) {
            $buffer .= $this->message->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $userId = AbstractInputUser::deserialize($__payload, $__offset);
        $months = Deserializer::int32($__payload, $__offset);
        $message = (($flags & (1 << 0)) !== 0) ? TextWithEntities::deserialize($__payload, $__offset) : null;

        return new self(
            $userId,
            $months,
            $message
        );
    }
}