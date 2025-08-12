<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractReactions;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getRecentReactions
 */
final class GetRecentReactionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x39461db2;
    
    public string $predicate = 'messages.getRecentReactions';
    
    public function getMethodName(): string
    {
        return 'messages.getRecentReactions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractReactions::class;
    }
    /**
     * @param int $limit
     * @param int $hash
     */
    public function __construct(
        public readonly int $limit,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}