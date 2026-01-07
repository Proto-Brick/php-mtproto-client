<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateTranscribedAudio
 */
final class UpdateTranscribedAudio extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x84cd5a;
    
    public string $predicate = 'updateTranscribedAudio';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param int $transcriptionId
     * @param string $text
     * @param true|null $pending
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly int $transcriptionId,
        public readonly string $text,
        public readonly ?true $pending = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pending) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int64($this->transcriptionId);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $pending = (($flags & (1 << 0)) !== 0) ? true : null;
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $msgId = Deserializer::int32($__payload, $__offset);
        $transcriptionId = Deserializer::int64($__payload, $__offset);
        $text = Deserializer::bytes($__payload, $__offset);

        return new self(
            $peer,
            $msgId,
            $transcriptionId,
            $text,
            $pending
        );
    }
}