<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionRequestedPeer
 */
final class MessageActionRequestedPeer extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x31518e9b;
    
    public string $predicate = 'messageActionRequestedPeer';
    
    /**
     * @param int $buttonId
     * @param list<AbstractPeer> $peers
     */
    public function __construct(
        public readonly int $buttonId,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->buttonId);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $buttonId = Deserializer::int32($stream);
        $peers = Deserializer::vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']);

        return new self(
            $buttonId,
            $peers
        );
    }
}