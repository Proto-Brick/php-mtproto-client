<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelParticipant
 */
final class ChannelParticipant extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 3409540633;
    
    public string $_ = 'channelParticipant';
    
    /**
     * @param int $userId
     * @param int $date
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date,
        public readonly ?int $subscriptionUntilDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->subscriptionUntilDate !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->subscriptionUntilDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $userId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $subscriptionUntilDate = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
            return new self(
            $userId,
            $date,
            $subscriptionUntilDate
        );
    }
}