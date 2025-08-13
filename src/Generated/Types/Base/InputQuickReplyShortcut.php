<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputQuickReplyShortcut
 */
final class InputQuickReplyShortcut extends AbstractInputQuickReplyShortcut
{
    public const CONSTRUCTOR_ID = 0x24596d41;
    
    public string $predicate = 'inputQuickReplyShortcut';
    
    /**
     * @param string $shortcut
     */
    public function __construct(
        public readonly string $shortcut
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->shortcut);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $shortcut = Deserializer::bytes($stream);

        return new self(
            $shortcut
        );
    }
}