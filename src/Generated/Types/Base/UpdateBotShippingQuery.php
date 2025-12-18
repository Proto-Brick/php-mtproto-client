<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotShippingQuery
 */
final class UpdateBotShippingQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb5aefd7d;
    
    public string $predicate = 'updateBotShippingQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param string $payload
     * @param PostAddress $shippingAddress
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly string $payload,
        public readonly PostAddress $shippingAddress
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::bytes($this->payload);
        $buffer .= $this->shippingAddress->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $queryId = Deserializer::int64($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $payload = Deserializer::bytes($__payload, $__offset);
        $shippingAddress = PostAddress::deserialize($__payload, $__offset);

        return new self(
            $queryId,
            $userId,
            $payload,
            $shippingAddress
        );
    }
}