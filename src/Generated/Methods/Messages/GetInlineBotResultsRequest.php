<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractBotResults;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getInlineBotResults
 */
final class GetInlineBotResultsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1364105629;
    
    public string $_ = 'messages.getInlineBotResults';
    
    public function getMethodName(): string
    {
        return 'messages.getInlineBotResults';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBotResults::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param AbstractInputPeer $peer
     * @param string $query
     * @param string $offset
     * @param AbstractInputGeoPoint|null $geoPoint
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly AbstractInputPeer $peer,
        public readonly string $query,
        public readonly string $offset,
        public readonly ?AbstractInputGeoPoint $geoPoint = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geoPoint !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->geoPoint->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->query);
        $buffer .= $serializer->bytes($this->offset);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}