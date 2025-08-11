<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AvailableReaction;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.availableReactions
 */
final class AvailableReactions extends AbstractAvailableReactions
{
    public const CONSTRUCTOR_ID = 0x768e3aad;
    
    public string $_ = 'messages.availableReactions';
    
    /**
     * @param int $hash
     * @param list<AvailableReaction> $reactions
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $reactions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->reactions);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $hash = Deserializer::int32($stream);
        $reactions = Deserializer::vectorOfObjects($stream, [AvailableReaction::class, 'deserialize']);
        return new self(
            $hash,
            $reactions
        );
    }
}