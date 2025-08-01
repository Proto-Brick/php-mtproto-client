<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractAttachMenuBotsBot;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getAttachMenuBot
 */
final class GetAttachMenuBotRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1998676370;
    
    public string $_ = 'messages.getAttachMenuBot';
    
    public function getMethodName(): string
    {
        return 'messages.getAttachMenuBot';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAttachMenuBotsBot::class;
    }
    /**
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}