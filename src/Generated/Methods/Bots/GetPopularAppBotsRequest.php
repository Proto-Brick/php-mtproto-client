<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Bots\PopularAppBots;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getPopularAppBots
 */
final class GetPopularAppBotsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc2510192;
    
    public string $predicate = 'bots.getPopularAppBots';
    
    public function getMethodName(): string
    {
        return 'bots.getPopularAppBots';
    }
    
    public function getResponseClass(): string
    {
        return PopularAppBots::class;
    }
    /**
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}