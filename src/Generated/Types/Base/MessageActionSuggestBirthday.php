<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSuggestBirthday
 */
final class MessageActionSuggestBirthday extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x2c8f2a25;
    
    public string $predicate = 'messageActionSuggestBirthday';
    
    /**
     * @param Birthday $birthday
     */
    public function __construct(
        public readonly Birthday $birthday
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->birthday->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $birthday = Birthday::deserialize($__payload, $__offset);

        return new self(
            $birthday
        );
    }
}