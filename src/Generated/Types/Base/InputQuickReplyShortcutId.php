<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputQuickReplyShortcutId
 */
final class InputQuickReplyShortcutId extends AbstractInputQuickReplyShortcut
{
    public const CONSTRUCTOR_ID = 0x1190cf1;
    
    public string $predicate = 'inputQuickReplyShortcutId';
    
    /**
     * @param int $shortcutId
     */
    public function __construct(
        public readonly int $shortcutId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $shortcutId = Deserializer::int32($stream);

        return new self(
            $shortcutId
        );
    }
}