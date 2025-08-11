<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AttachMenuBotsBot;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getAttachMenuBot
 */
final class GetAttachMenuBotRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x77216192;
    
    public string $_ = 'messages.getAttachMenuBot';
    
    public function getMethodName(): string
    {
        return 'messages.getAttachMenuBot';
    }
    
    public function getResponseClass(): string
    {
        return AttachMenuBotsBot::class;
    }
    /**
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}