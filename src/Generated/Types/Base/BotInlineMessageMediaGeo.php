<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/botInlineMessageMediaGeo
 */
final class BotInlineMessageMediaGeo extends AbstractBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x51846fd;
    
    public string $predicate = 'botInlineMessageMediaGeo';
    
    /**
     * @param AbstractGeoPoint $geo
     * @param int|null $heading
     * @param int|null $period
     * @param int|null $proximityNotificationRadius
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly AbstractGeoPoint $geo,
        public readonly ?int $heading = null,
        public readonly ?int $period = null,
        public readonly ?int $proximityNotificationRadius = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->heading !== null) {
            $flags |= (1 << 0);
        }
        if ($this->period !== null) {
            $flags |= (1 << 1);
        }
        if ($this->proximityNotificationRadius !== null) {
            $flags |= (1 << 3);
        }
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->geo->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->heading);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->period);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->proximityNotificationRadius);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $geo = AbstractGeoPoint::deserialize($__payload, $__offset);
        $heading = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $period = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $proximityNotificationRadius = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($__payload, $__offset) : null;

        return new self(
            $geo,
            $heading,
            $period,
            $proximityNotificationRadius,
            $replyMarkup
        );
    }
}