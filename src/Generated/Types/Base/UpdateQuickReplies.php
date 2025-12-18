<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateQuickReplies
 */
final class UpdateQuickReplies extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf9470ab2;
    
    public string $predicate = 'updateQuickReplies';
    
    /**
     * @param list<QuickReply> $quickReplies
     */
    public function __construct(
        public readonly array $quickReplies
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->quickReplies);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $quickReplies = Deserializer::vectorOfObjects($__payload, $__offset, [QuickReply::class, 'deserialize']);

        return new self(
            $quickReplies
        );
    }
}