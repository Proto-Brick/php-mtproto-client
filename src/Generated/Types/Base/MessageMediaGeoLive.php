<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaGeoLive
 */
final class MessageMediaGeoLive extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xb940c666;
    
    public string $predicate = 'messageMediaGeoLive';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->heading !== null) {
            $flags |= (1 << 0);
        }
        if ($this->proximityNotificationRadius !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->geo->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->heading);
        }
        $buffer .= Serializer::int32($this->period);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->proximityNotificationRadius);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $geo = AbstractGeoPoint::deserialize($stream);
        $heading = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $period = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $proximityNotificationRadius = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $geo,
            $period,
            $heading,
            $proximityNotificationRadius
        );
    }
}