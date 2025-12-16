<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneCallAccepted
 */
final class PhoneCallAccepted extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0x3660c311;
    
    public string $predicate = 'phoneCallAccepted';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     * @param string $gB
     * @param PhoneCallProtocol $protocol
     * @param true|null $video
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId,
        public readonly string $gB,
        public readonly PhoneCallProtocol $protocol,
        public readonly ?true $video = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->adminId);
        $buffer .= Serializer::int64($this->participantId);
        $buffer .= Serializer::bytes($this->gB);
        $buffer .= $this->protocol->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $video = (($flags & (1 << 6)) !== 0) ? true : null;
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $adminId = Deserializer::int64($stream);
        $participantId = Deserializer::int64($stream);
        $gB = Deserializer::bytes($stream);
        $protocol = PhoneCallProtocol::deserialize($stream);

        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId,
            $gB,
            $protocol,
            $video
        );
    }
}