<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phoneCallRequested
 */
final class PhoneCallRequested extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0x14b0ed0c;
    
    public string $_ = 'phoneCallRequested';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     * @param string $gAHash
     * @param PhoneCallProtocol $protocol
     * @param bool|null $video
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId,
        public readonly string $gAHash,
        public readonly PhoneCallProtocol $protocol,
        public readonly ?bool $video = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) $flags |= (1 << 6);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->adminId);
        $buffer .= $serializer->int64($this->participantId);
        $buffer .= $serializer->bytes($this->gAHash);
        $buffer .= $this->protocol->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $video = ($flags & (1 << 6)) ? true : null;
        $id = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $adminId = $deserializer->int64($stream);
        $participantId = $deserializer->int64($stream);
        $gAHash = $deserializer->bytes($stream);
        $protocol = PhoneCallProtocol::deserialize($deserializer, $stream);
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