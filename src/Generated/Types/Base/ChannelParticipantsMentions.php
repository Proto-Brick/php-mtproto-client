<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelParticipantsMentions
 */
final class ChannelParticipantsMentions extends AbstractChannelParticipantsFilter
{
    public const CONSTRUCTOR_ID = 0xe04b5ceb;
    
    public string $predicate = 'channelParticipantsMentions';
    
    /**
     * @param string|null $q
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly ?string $q = null,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->q !== null) {
            $flags |= (1 << 0);
        }
        if ($this->topMsgId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->q);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $q = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $topMsgId = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $q,
            $topMsgId
        );
    }
}