<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phoneCall
 */
final class PhoneCall extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0x30535af5;
    
    public string $_ = 'phoneCall';
    
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
     * @param bool|null $p2pAllowed
     * @param bool|null $video
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
        public readonly ?bool $p2pAllowed = null,
        public readonly ?bool $video = null,
        public readonly ?array $customParameters = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->p2pAllowed) $flags |= (1 << 5);
        if ($this->video) $flags |= (1 << 6);
        if ($this->customParameters !== null) $flags |= (1 << 7);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->adminId);
        $buffer .= $serializer->int64($this->participantId);
        $buffer .= $serializer->bytes($this->gAOrB);
        $buffer .= $serializer->int64($this->keyFingerprint);
        $buffer .= $this->protocol->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->connections);
        $buffer .= $serializer->int32($this->startDate);
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->bytes(json_encode($this->customParameters, JSON_FORCE_OBJECT));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $p2pAllowed = ($flags & (1 << 5)) ? true : null;
        $video = ($flags & (1 << 6)) ? true : null;
        $id = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $adminId = $deserializer->int64($stream);
        $participantId = $deserializer->int64($stream);
        $gAOrB = $deserializer->bytes($stream);
        $keyFingerprint = $deserializer->int64($stream);
        $protocol = PhoneCallProtocol::deserialize($deserializer, $stream);
        $connections = $deserializer->vectorOfObjects($stream, [AbstractPhoneConnection::class, 'deserialize']);
        $startDate = $deserializer->int32($stream);
        $customParameters = ($flags & (1 << 7)) ? $deserializer->deserializeDataJSON($stream) : null;
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
            $customParameters
        );
    }
}