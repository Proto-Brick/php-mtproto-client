<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.savedDialogsNotModified
 */
final class SavedDialogsNotModified extends AbstractSavedDialogs
{
    public const CONSTRUCTOR_ID = 0xc01f6fe8;
    
    public string $predicate = 'messages.savedDialogsNotModified';
    
    /**
     * @param int $count
     */
    public function __construct(
        public readonly int $count
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $count = Deserializer::int32($__payload, $__offset);

        return new self(
            $count
        );
    }
}