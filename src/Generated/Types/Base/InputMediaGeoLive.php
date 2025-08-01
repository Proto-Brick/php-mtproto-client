<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaGeoLive
 */
final class InputMediaGeoLive extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 2535434307;
    
    public string $_ = 'inputMediaGeoLive';
    
    /**
     * @param AbstractInputGeoPoint $geoPoint
     * @param bool|null $stopped
     * @param int|null $heading
     * @param int|null $period
     * @param int|null $proximityNotificationRadius
     */
    public function __construct(
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly ?bool $stopped = null,
        public readonly ?int $heading = null,
        public readonly ?int $period = null,
        public readonly ?int $proximityNotificationRadius = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->stopped) $flags |= (1 << 0);
        if ($this->heading !== null) $flags |= (1 << 2);
        if ($this->period !== null) $flags |= (1 << 1);
        if ($this->proximityNotificationRadius !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->geoPoint->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->heading);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->period);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->proximityNotificationRadius);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $stopped = ($flags & (1 << 0)) ? true : null;
        $geoPoint = AbstractInputGeoPoint::deserialize($deserializer, $stream);
        $heading = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $period = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $proximityNotificationRadius = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
            return new self(
            $geoPoint,
            $stopped,
            $heading,
            $period,
            $proximityNotificationRadius
        );
    }
}