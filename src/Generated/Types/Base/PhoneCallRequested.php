<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneCallRequested
 */
final class PhoneCallRequested extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0x14b0ed0c;
    
    public string $predicate = 'phoneCallRequested';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     * @param string $gAHash
     * @param PhoneCallProtocol $protocol
     * @param true|null $video
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId,
        public readonly string $gAHash,
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
        $buffer .= Serializer::bytes($this->gAHash);
        $buffer .= $this->protocol->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $video = (($flags & (1 << 6)) !== 0) ? true : null;
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
        $gAHash = Deserializer::bytes($stream);
        $protocol = PhoneCallProtocol::deserialize($stream);

        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId,
            $gAHash,
            $protocol,
            $video
        );
    }
}