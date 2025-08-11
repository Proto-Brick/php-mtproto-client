<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.editQuickReplyShortcut
 */
final class EditQuickReplyShortcutRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5c003cef;
    
    public string $_ = 'messages.editQuickReplyShortcut';
    
    public function getMethodName(): string
    {
        return 'messages.editQuickReplyShortcut';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $shortcutId
     * @param string $shortcut
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly string $shortcut
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= Serializer::bytes($this->shortcut);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}