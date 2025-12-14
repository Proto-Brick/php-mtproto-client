<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateDraftMessage
 */
final class UpdateDraftMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xedfc111e;
    
    public string $predicate = 'updateDraftMessage';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractDraftMessage $draft
     * @param int|null $topMsgId
     * @param AbstractPeer|null $savedPeerId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractDraftMessage $draft,
        public readonly ?int $topMsgId = null,
        public readonly ?AbstractPeer $savedPeerId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->savedPeerId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        $buffer .= $this->draft->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $peer = AbstractPeer::deserialize($stream);
        $topMsgId = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $savedPeerId = (($flags & (1 << 1)) !== 0) ? AbstractPeer::deserialize($stream) : null;
        $draft = AbstractDraftMessage::deserialize($stream);

        return new self(
            $peer,
            $draft,
            $topMsgId,
            $savedPeerId
        );
    }
}