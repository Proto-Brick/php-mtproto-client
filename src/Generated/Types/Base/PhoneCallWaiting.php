<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phoneCallWaiting
 */
final class PhoneCallWaiting extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0xc5226f17;
    
    public string $_ = 'phoneCallWaiting';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     * @param PhoneCallProtocol $protocol
     * @param bool|null $video
     * @param int|null $receiveDate
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId,
        public readonly PhoneCallProtocol $protocol,
        public readonly ?bool $video = null,
        public readonly ?int $receiveDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) $flags |= (1 << 6);
        if ($this->receiveDate !== null) $flags |= (1 << 0);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $video = ($flags & (1 << 6)) ? true : null;
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $adminId = Deserializer::int64($stream);
        $participantId = Deserializer::int64($stream);
        $protocol = PhoneCallProtocol::deserialize($stream);
        $receiveDate = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
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