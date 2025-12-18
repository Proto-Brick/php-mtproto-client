<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageID
 */
final class InputBotInlineMessageID extends AbstractInputBotInlineMessageID
{
    public const CONSTRUCTOR_ID = 0x890c3d89;
    
    public string $predicate = 'inputBotInlineMessageID';
    
    /**
     * @param int $dcId
     * @param int $id
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $dcId,
        public readonly int $id,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $dcId = Deserializer::int32($__payload, $__offset);
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);

        return new self(
            $dcId,
            $id,
            $accessHash
        );
    }
}