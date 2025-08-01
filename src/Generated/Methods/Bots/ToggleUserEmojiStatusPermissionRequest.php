<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.toggleUserEmojiStatusPermission
 */
final class ToggleUserEmojiStatusPermissionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 115237778;
    
    public string $_ = 'bots.toggleUserEmojiStatusPermission';
    
    public function getMethodName(): string
    {
        return 'bots.toggleUserEmojiStatusPermission';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param bool $enabled
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly bool $enabled
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= ($this->enabled ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}