<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.deleteQuickReplyShortcut
 */
final class DeleteQuickReplyShortcutRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1019234112;
    
    public string $_ = 'messages.deleteQuickReplyShortcut';
    
    public function getMethodName(): string
    {
        return 'messages.deleteQuickReplyShortcut';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
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
        throw new \LogicException('Request objects are not deserializable');
    }
}