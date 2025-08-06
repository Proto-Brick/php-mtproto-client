<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.checkQuickReplyShortcut
 */
final class CheckQuickReplyShortcutRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf1d0fbd3;
    
    public string $_ = 'messages.checkQuickReplyShortcut';
    
    public function getMethodName(): string
    {
        return 'messages.checkQuickReplyShortcut';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $shortcut
     */
    public function __construct(
        public readonly string $shortcut
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->shortcut);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}