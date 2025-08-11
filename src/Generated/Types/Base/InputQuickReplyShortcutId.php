<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputQuickReplyShortcutId
 */
final class InputQuickReplyShortcutId extends AbstractInputQuickReplyShortcut
{
    public const CONSTRUCTOR_ID = 0x1190cf1;
    
    public string $_ = 'inputQuickReplyShortcutId';
    
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $shortcutId = Deserializer::int32($stream);
        return new self(
            $shortcutId
        );
    }
}