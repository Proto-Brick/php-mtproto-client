<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageMediaVenue
 */
final class InputBotInlineMessageMediaVenue extends AbstractInputBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x417bbf11;
    
    public string $predicate = 'inputBotInlineMessageMediaVenue';
    
    /**
     * @param AbstractInputGeoPoint $geoPoint
     * @param string $title
     * @param string $address
     * @param string $provider
     * @param string $venueId
     * @param string $venueType
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly string $title,
        public readonly string $address,
        public readonly string $provider,
        public readonly string $venueId,
        public readonly string $venueType,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->geoPoint->serialize();
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->address);
        $buffer .= Serializer::bytes($this->provider);
        $buffer .= Serializer::bytes($this->venueId);
        $buffer .= Serializer::bytes($this->venueType);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $geoPoint = AbstractInputGeoPoint::deserialize($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $address = Deserializer::bytes($__payload, $__offset);
        $provider = Deserializer::bytes($__payload, $__offset);
        $venueId = Deserializer::bytes($__payload, $__offset);
        $venueType = Deserializer::bytes($__payload, $__offset);
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($__payload, $__offset) : null;

        return new self(
            $geoPoint,
            $title,
            $address,
            $provider,
            $venueId,
            $venueType,
            $replyMarkup
        );
    }
}