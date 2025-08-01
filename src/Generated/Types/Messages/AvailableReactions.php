<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractAvailableReaction;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.availableReactions
 */
final class AvailableReactions extends AbstractAvailableReactions
{
    public const CONSTRUCTOR_ID = 1989032621;
    
    public string $_ = 'messages.availableReactions';
    
    /**
     * @param int $hash
     * @param list<AbstractAvailableReaction> $reactions
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $reactions
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->reactions);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int32($stream);
        $reactions = $deserializer->vectorOfObjects($stream, [AbstractAvailableReaction::class, 'deserialize']);
            return new self(
            $hash,
            $reactions
        );
    }
}