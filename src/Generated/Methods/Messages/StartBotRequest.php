<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.startBot
 */
final class StartBotRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe6df7378;
    
    public string $_ = 'messages.startBot';
    
    public function getMethodName(): string
    {
        return 'messages.startBot';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param AbstractInputPeer $peer
     * @param int $randomId
     * @param string $startParam
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly AbstractInputPeer $peer,
        public readonly int $randomId,
        public readonly string $startParam
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int64($this->randomId);
        $buffer .= $serializer->bytes($this->startParam);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}