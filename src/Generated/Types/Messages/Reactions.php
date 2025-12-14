<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReaction;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        $hash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $reactions = Deserializer::vectorOfObjects($stream, [AbstractReaction::class, 'deserialize']);

        return new self(
            $hash,
            $reactions
        );
    }
}