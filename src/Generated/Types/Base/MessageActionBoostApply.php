<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionBoostApply
 */
final class MessageActionBoostApply extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xcc02aa6d;
    
    public string $predicate = 'messageActionBoostApply';
    
    /**
     * @param int $boosts
     */
    public function __construct(
        public readonly int $boosts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->boosts);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $boosts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $boosts
        );
    }
}