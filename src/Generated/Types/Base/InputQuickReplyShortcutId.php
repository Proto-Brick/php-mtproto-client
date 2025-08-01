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
    public const CONSTRUCTOR_ID = 18418929;
    
    public string $_ = 'inputQuickReplyShortcutId';
    
    /**
     * @param int $shortcutId
     */
    public function __construct(
        public readonly int $shortcutId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->shortcutId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $shortcutId = $deserializer->int32($stream);
            return new self(
            $shortcutId
        );
    }
}