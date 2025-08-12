<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotApp;
use DigitalStars\MtprotoClient\Generated\Types\Messages\BotApp;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getBotApp
 */
final class GetBotAppRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x34fdc5c3;
    
    public string $predicate = 'messages.getBotApp';
    
    public function getMethodName(): string
    {
        return 'messages.getBotApp';
    }
    
    public function getResponseClass(): string
    {
        return BotApp::class;
    }
    /**
     * @param AbstractInputBotApp $app
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputBotApp $app,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->app->serialize();
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}