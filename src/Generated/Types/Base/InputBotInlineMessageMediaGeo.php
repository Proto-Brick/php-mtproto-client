<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageMediaGeo
 */
final class InputBotInlineMessageMediaGeo extends AbstractInputBotInlineMessage
{
    public const CONSTRUCTOR_ID = 2526190213;
    
    public string $_ = 'inputBotInlineMessageMediaGeo';
    
    /**
     * @param AbstractInputGeoPoint $geoPoint
     * @param int|null $heading
     * @param int|null $period
     * @param int|null $proximityNotificationRadius
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly ?int $heading = null,
        public readonly ?int $period = null,
        public readonly ?int $proximityNotificationRadius = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->heading !== null) $flags |= (1 << 0);
        if ($this->period !== null) $flags |= (1 << 1);
        if ($this->proximityNotificationRadius !== null) $flags |= (1 << 3);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->geoPoint->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->heading);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->period);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->proximityNotificationRadius);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $geoPoint = AbstractInputGeoPoint::deserialize($deserializer, $stream);
        $heading = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $period = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $proximityNotificationRadius = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
            return new self(
            $geoPoint,
            $heading,
            $period,
            $proximityNotificationRadius,
            $replyMarkup
        );
    }
}