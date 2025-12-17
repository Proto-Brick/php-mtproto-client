<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotWebhookJSONQuery
 */
final class UpdateBotWebhookJSONQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9b9240a6;
    
    public string $predicate = 'updateBotWebhookJSONQuery';
    
    /**
     * @param int $queryId
     * @param array $data
     * @param int $timeout
     */
    public function __construct(
        public readonly int $queryId,
        public readonly array $data,
        public readonly int $timeout
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::serializeDataJSON($this->data);
        $buffer .= Serializer::int32($this->timeout);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $queryId = Deserializer::int64($__payload, $__offset);
        $data = Deserializer::deserializeDataJSON($__payload, $__offset);
        $timeout = Deserializer::int32($__payload, $__offset);

        return new self(
            $queryId,
            $data,
            $timeout
        );
    }
}