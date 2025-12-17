<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneCallWaiting
 */
final class PhoneCallWaiting extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0xc5226f17;
    
    public string $predicate = 'phoneCallWaiting';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     * @param PhoneCallProtocol $protocol
     * @param true|null $video
     * @param int|null $receiveDate
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId,
        public readonly PhoneCallProtocol $protocol,
        public readonly ?true $video = null,
        public readonly ?int $receiveDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) {
            $flags |= (1 << 6);
        }
        if ($this->receiveDate !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->adminId);
        $buffer .= Serializer::int64($this->participantId);
        $buffer .= $this->protocol->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->receiveDate);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $video = (($flags & (1 << 6)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $adminId = Deserializer::int64($__payload, $__offset);
        $participantId = Deserializer::int64($__payload, $__offset);
        $protocol = PhoneCallProtocol::deserialize($__payload, $__offset);
        $receiveDate = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId,
            $protocol,
            $video,
            $receiveDate
        );
    }
}