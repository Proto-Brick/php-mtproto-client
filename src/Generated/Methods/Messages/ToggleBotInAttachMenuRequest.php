<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.toggleBotInAttachMenu
 */
final class ToggleBotInAttachMenuRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1777704297;
    
    public string $_ = 'messages.toggleBotInAttachMenu';
    
    public function getMethodName(): string
    {
        return 'messages.toggleBotInAttachMenu';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param bool $enabled
     * @param bool|null $writeAllowed
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly bool $enabled,
        public readonly ?bool $writeAllowed = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->writeAllowed) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->bot->serialize($serializer);
        $buffer .= ($this->enabled ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}