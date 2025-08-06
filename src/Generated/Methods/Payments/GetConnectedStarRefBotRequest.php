<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Payments\ConnectedStarRefBots;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getConnectedStarRefBot
 */
final class GetConnectedStarRefBotRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb7d998f0;
    
    public string $_ = 'payments.getConnectedStarRefBot';
    
    public function getMethodName(): string
    {
        return 'payments.getConnectedStarRefBot';
    }
    
    public function getResponseClass(): string
    {
        return ConnectedStarRefBots::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->bot->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}