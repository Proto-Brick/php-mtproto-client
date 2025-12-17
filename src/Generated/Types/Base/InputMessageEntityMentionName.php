<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMessageEntityMentionName
 */
final class InputMessageEntityMentionName extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0x208e68c9;
    
    public string $predicate = 'inputMessageEntityMentionName';
    
    /**
     * @param int $offset
     * @param int $length
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $offset = Deserializer::int32($__payload, $__offset);
        $length = Deserializer::int32($__payload, $__offset);
        $userId = AbstractInputUser::deserialize($__payload, $__offset);

        return new self(
            $offset,
            $length,
            $userId
        );
    }
}