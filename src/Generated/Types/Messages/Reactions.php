<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.reactions
 */
final class Reactions extends AbstractReactions
{
    public const CONSTRUCTOR_ID = 0xeafdf716;
    
    public string $predicate = 'messages.reactions';
    
    /**
     * @param int $hash
     * @param list<AbstractReaction> $reactions
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $reactions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->reactions);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int64($stream);
        $reactions = Deserializer::vectorOfObjects($stream, [AbstractReaction::class, 'deserialize']);

        return new self(
            $hash,
            $reactions
        );
    }
}