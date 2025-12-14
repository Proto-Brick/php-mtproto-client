<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneCall
 */
final class PhoneCall extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0x30535af5;
    
    public string $predicate = 'phoneCall';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     * @param string $gAOrB
     * @param int $keyFingerprint
     * @param PhoneCallProtocol $protocol
     * @param list<AbstractPhoneConnection> $connections
     * @param int $startDate
     * @param true|null $p2pAllowed
     * @param true|null $video
     * @param true|null $conferenceSupported
     * @param array|null $customParameters
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId,
        public readonly string $gAOrB,
        public readonly int $keyFingerprint,
        public readonly PhoneCallProtocol $protocol,
        public readonly array $connections,
        public readonly int $startDate,
        public readonly ?true $p2pAllowed = null,
        public readonly ?true $video = null,
        public readonly ?true $conferenceSupported = null,
        public readonly ?array $customParameters = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->p2pAllowed) {
            $flags |= (1 << 5);
        }
        if ($this->video) {
            $flags |= (1 << 6);
        }
        if ($this->conferenceSupported) {
            $flags |= (1 << 8);
        }
        if ($this->customParameters !== null) {
            $flags |= (1 << 7);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->adminId);
        $buffer .= Serializer::int64($this->participantId);
        $buffer .= Serializer::bytes($this->gAOrB);
        $buffer .= Serializer::int64($this->keyFingerprint);
        $buffer .= $this->protocol->serialize();
        $buffer .= Serializer::vectorOfObjects($this->connections);
        $buffer .= Serializer::int32($this->startDate);
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::serializeDataJSON($this->customParameters);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $p2pAllowed = (($flags & (1 << 5)) !== 0) ? true : null;
        $video = (($flags & (1 << 6)) !== 0) ? true : null;
        $conferenceSupported = (($flags & (1 << 8)) !== 0) ? true : null;
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $accessHash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $adminId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $participantId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $gAOrB = Deserializer::bytes($stream);
        $keyFingerprint = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $protocol = PhoneCallProtocol::deserialize($stream);
        $connections = Deserializer::vectorOfObjects($stream, [AbstractPhoneConnection::class, 'deserialize']);
        $startDate = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $customParameters = (($flags & (1 << 7)) !== 0) ? Deserializer::deserializeDataJSON($stream) : null;

        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId,
            $gAOrB,
            $keyFingerprint,
            $protocol,
            $connections,
            $startDate,
            $p2pAllowed,
            $video,
            $conferenceSupported,
            $customParameters
        );
    }
}