<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotPurchasedPaidMedia
 */
final class UpdateBotPurchasedPaidMedia extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x283bd312;
    
    public string $predicate = 'updateBotPurchasedPaidMedia';
    
    /**
     * @param int $userId
     * @param string $payload
     * @param int $qts
     */
    public function __construct(
        public readonly int $userId,
        public readonly string $payload,
        public readonly int $qts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->payload);
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $userId = Deserializer::int64($__payload, $__offset);
        $payload = Deserializer::bytes($__payload, $__offset);
        $qts = Deserializer::int32($__payload, $__offset);

        return new self(
            $userId,
            $payload,
            $qts
        );
    }
}