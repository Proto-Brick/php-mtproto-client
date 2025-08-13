<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageEmpty
 */
final class MessageEmpty extends AbstractMessage
{
    public const CONSTRUCTOR_ID = 0x90a6ca84;
    
    public string $predicate = 'messageEmpty';
    
    /**
     * @param int $id
     * @param AbstractPeer|null $peerId
     */
    public function __construct(
        public readonly int $id,
        public readonly ?AbstractPeer $peerId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peerId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->peerId->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $id = Deserializer::int32($stream);
        $peerId = (($flags & (1 << 0)) !== 0) ? AbstractPeer::deserialize($stream) : null;

        return new self(
            $id,
            $peerId
        );
    }
}