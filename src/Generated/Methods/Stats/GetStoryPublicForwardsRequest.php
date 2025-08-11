<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stats\PublicForwards;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getStoryPublicForwards
 */
final class GetStoryPublicForwardsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa6437ef6;
    
    public string $_ = 'stats.getStoryPublicForwards';
    
    public function getMethodName(): string
    {
        return 'stats.getStoryPublicForwards';
    }
    
    public function getResponseClass(): string
    {
        return PublicForwards::class;
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}