<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Stats\AbstractPublicForwards;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getMessagePublicForwards
 */
final class GetMessagePublicForwardsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1595212100;
    
    public string $_ = 'stats.getMessagePublicForwards';
    
    public function getMethodName(): string
    {
        return 'stats.getMessagePublicForwards';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPublicForwards::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $msgId
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $msgId,
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        $buffer .= $serializer->bytes($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}