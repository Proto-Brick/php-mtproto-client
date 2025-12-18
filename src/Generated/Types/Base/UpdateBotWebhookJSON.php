<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotWebhookJSON
 */
final class UpdateBotWebhookJSON extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8317c0c3;
    
    public string $predicate = 'updateBotWebhookJSON';
    
    /**
     * @param array $data
     */
    public function __construct(
        public readonly array $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->data);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $data = Deserializer::deserializeDataJSON($__payload, $__offset);

        return new self(
            $data
        );
    }
}