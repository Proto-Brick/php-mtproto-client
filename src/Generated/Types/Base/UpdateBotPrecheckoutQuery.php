<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotPrecheckoutQuery
 */
final class UpdateBotPrecheckoutQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8caa9a96;
    
    public string $predicate = 'updateBotPrecheckoutQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param string $payload
     * @param string $currency
     * @param int $totalAmount
     * @param PaymentRequestedInfo|null $info
     * @param string|null $shippingOptionId
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly string $payload,
        public readonly string $currency,
        public readonly int $totalAmount,
        public readonly ?PaymentRequestedInfo $info = null,
        public readonly ?string $shippingOptionId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->info !== null) {
            $flags |= (1 << 0);
        }
        if ($this->shippingOptionId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->payload);
        if ($flags & (1 << 0)) {
            $buffer .= $this->info->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->shippingOptionId);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->totalAmount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $queryId = Deserializer::int64($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $payload = Deserializer::bytes($__payload, $__offset);
        $info = (($flags & (1 << 0)) !== 0) ? PaymentRequestedInfo::deserialize($__payload, $__offset) : null;
        $shippingOptionId = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $currency = Deserializer::bytes($__payload, $__offset);
        $totalAmount = Deserializer::int64($__payload, $__offset);

        return new self(
            $queryId,
            $userId,
            $payload,
            $currency,
            $totalAmount,
            $info,
            $shippingOptionId
        );
    }
}