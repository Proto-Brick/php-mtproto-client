<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/quickReply
 */
final class QuickReply extends TlObject
{
    public const CONSTRUCTOR_ID = 0x697102b;
    
    public string $predicate = 'quickReply';
    
    /**
     * @param int $shortcutId
     * @param string $shortcut
     * @param int $topMessage
     * @param int $count
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly string $shortcut,
        public readonly int $topMessage,
        public readonly int $count
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= Serializer::bytes($this->shortcut);
        $buffer .= Serializer::int32($this->topMessage);
        $buffer .= Serializer::int32($this->count);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $shortcutId = Deserializer::int32($__payload, $__offset);
        $shortcut = Deserializer::bytes($__payload, $__offset);
        $topMessage = Deserializer::int32($__payload, $__offset);
        $count = Deserializer::int32($__payload, $__offset);

        return new self(
            $shortcutId,
            $shortcut,
            $topMessage,
            $count
        );
    }
}