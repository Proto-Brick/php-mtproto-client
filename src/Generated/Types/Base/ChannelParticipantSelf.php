<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelParticipantSelf
 */
final class ChannelParticipantSelf extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 1331723247;
    
    public string $_ = 'channelParticipantSelf';
    
    /**
     * @param int $userId
     * @param int $inviterId
     * @param int $date
     * @param bool|null $viaRequest
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $inviterId,
        public readonly int $date,
        public readonly ?bool $viaRequest = null,
        public readonly ?int $subscriptionUntilDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaRequest) $flags |= (1 << 0);
        if ($this->subscriptionUntilDate !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int64($this->inviterId);
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->subscriptionUntilDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $viaRequest = ($flags & (1 << 0)) ? true : null;
        $userId = $deserializer->int64($stream);
        $inviterId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $subscriptionUntilDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $userId,
            $inviterId,
            $date,
            $viaRequest,
            $subscriptionUntilDate
        );
    }
}