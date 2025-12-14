<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaGeoLive
 */
final class InputMediaGeoLive extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x971fa843;
    
    public string $predicate = 'inputMediaGeoLive';
    
    /**
     * @param AbstractInputGeoPoint $geoPoint
     * @param true|null $stopped
     * @param int|null $heading
     * @param int|null $period
     * @param int|null $proximityNotificationRadius
     */
    public function __construct(
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly ?true $stopped = null,
        public readonly ?int $heading = null,
        public readonly ?int $period = null,
        public readonly ?int $proximityNotificationRadius = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->stopped) {
            $flags |= (1 << 0);
        }
        if ($this->heading !== null) {
            $flags |= (1 << 2);
        }
        if ($this->period !== null) {
            $flags |= (1 << 1);
        }
        if ($this->proximityNotificationRadius !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->geoPoint->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->heading);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->period);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->proximityNotificationRadius);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $stopped = (($flags & (1 << 0)) !== 0) ? true : null;
        $geoPoint = AbstractInputGeoPoint::deserialize($stream);
        $heading = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($stream) : null;
        $period = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;
        $proximityNotificationRadius = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $geoPoint,
            $stopped,
            $heading,
            $period,
            $proximityNotificationRadius
        );
    }
}