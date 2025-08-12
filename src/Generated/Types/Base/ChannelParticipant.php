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
    public const CONSTRUCTOR_ID = 0xcb397619;
    
    public string $predicate = 'channelParticipant';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->subscriptionUntilDate !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->subscriptionUntilDate);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $subscriptionUntilDate = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;

        return new self(
            $userId,
            $date,
            $subscriptionUntilDate
        );
    }
}