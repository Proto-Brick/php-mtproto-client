<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelParticipantSelf
 */
final class ChannelParticipantSelf extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 0x4f607bef;
    
    public string $predicate = 'channelParticipantSelf';
    
    /**
     * @param int $userId
     * @param int $inviterId
     * @param int $date
     * @param true|null $viaRequest
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $inviterId,
        public readonly int $date,
        public readonly ?true $viaRequest = null,
        public readonly ?int $subscriptionUntilDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaRequest) {
            $flags |= (1 << 0);
        }
        if ($this->subscriptionUntilDate !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int64($this->inviterId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->subscriptionUntilDate);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $viaRequest = (($flags & (1 << 0)) !== 0) ? true : null;
        $userId = Deserializer::int64($__payload, $__offset);
        $inviterId = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $subscriptionUntilDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $userId,
            $inviterId,
            $date,
            $viaRequest,
            $subscriptionUntilDate
        );
    }
}