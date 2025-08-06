<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatReactionsSome
 */
final class ChatReactionsSome extends AbstractChatReactions
{
    public const CONSTRUCTOR_ID = 0x661d4037;
    
    public string $_ = 'chatReactionsSome';
    
    /**
     * @param list<AbstractReaction> $reactions
     */
    public function __construct(
        public readonly array $reactions
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->reactions);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $reactions = $deserializer->vectorOfObjects($stream, [AbstractReaction::class, 'deserialize']);
        return new self(
            $reactions
        );
    }
}