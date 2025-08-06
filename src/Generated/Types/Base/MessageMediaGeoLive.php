<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaGeoLive
 */
final class MessageMediaGeoLive extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xb940c666;
    
    public string $_ = 'messageMediaGeoLive';
    
    /**
     * @param AbstractGeoPoint $geo
     * @param int $period
     * @param int|null $heading
     * @param int|null $proximityNotificationRadius
     */
    public function __construct(
        public readonly AbstractGeoPoint $geo,
        public readonly int $period,
        public readonly ?int $heading = null,
        public readonly ?int $proximityNotificationRadius = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->heading !== null) $flags |= (1 << 0);
        if ($this->proximityNotificationRadius !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->geo->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->heading);
        }
        $buffer .= $serializer->int32($this->period);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->proximityNotificationRadius);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $geo = AbstractGeoPoint::deserialize($deserializer, $stream);
        $heading = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $period = $deserializer->int32($stream);
        $proximityNotificationRadius = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        return new self(
            $geo,
            $period,
            $heading,
            $proximityNotificationRadius
        );
    }
}