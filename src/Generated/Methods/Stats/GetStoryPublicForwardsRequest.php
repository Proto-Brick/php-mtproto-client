<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stats\AbstractPublicForwards;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getStoryPublicForwards
 */
final class GetStoryPublicForwardsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2789441270;
    
    public string $_ = 'stats.getStoryPublicForwards';
    
    public function getMethodName(): string
    {
        return 'stats.getStoryPublicForwards';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPublicForwards::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->bytes($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}