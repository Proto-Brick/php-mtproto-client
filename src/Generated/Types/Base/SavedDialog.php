<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/savedDialog
 */
final class SavedDialog extends AbstractSavedDialog
{
    public const CONSTRUCTOR_ID = 0xbd87cb6c;
    
    public string $predicate = 'savedDialog';
    
    /**
     * @param AbstractPeer $peer
     * @param int $topMessage
     * @param true|null $pinned
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $topMessage,
        public readonly ?true $pinned = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topMessage);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $pinned = (($flags & (1 << 2)) !== 0) ? true : null;
        $peer = AbstractPeer::deserialize($stream);
        $topMessage = Deserializer::int32($stream);

        return new self(
            $peer,
            $topMessage,
            $pinned
        );
    }
}