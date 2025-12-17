<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/replyInlineMarkup
 */
final class ReplyInlineMarkup extends AbstractReplyMarkup
{
    public const CONSTRUCTOR_ID = 0x48a30254;
    
    public string $predicate = 'replyInlineMarkup';
    
    /**
     * @param list<KeyboardButtonRow> $rows
     */
    public function __construct(
        public readonly array $rows
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->rows);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $rows = Deserializer::vectorOfObjects($__payload, $__offset, [KeyboardButtonRow::class, 'deserialize']);

        return new self(
            $rows
        );
    }
}