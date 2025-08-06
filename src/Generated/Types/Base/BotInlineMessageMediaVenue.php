<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botInlineMessageMediaVenue
 */
final class BotInlineMessageMediaVenue extends AbstractBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x8a86659c;
    
    public string $_ = 'botInlineMessageMediaVenue';
    
    /**
     * @param AbstractGeoPoint $geo
     * @param string $title
     * @param string $address
     * @param string $provider
     * @param string $venueId
     * @param string $venueType
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly AbstractGeoPoint $geo,
        public readonly string $title,
        public readonly string $address,
        public readonly string $provider,
        public readonly string $venueId,
        public readonly string $venueType,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->geo->serialize($serializer);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->address);
        $buffer .= $serializer->bytes($this->provider);
        $buffer .= $serializer->bytes($this->venueId);
        $buffer .= $serializer->bytes($this->venueType);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $geo = AbstractGeoPoint::deserialize($deserializer, $stream);
        $title = $deserializer->bytes($stream);
        $address = $deserializer->bytes($stream);
        $provider = $deserializer->bytes($stream);
        $venueId = $deserializer->bytes($stream);
        $venueType = $deserializer->bytes($stream);
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
        return new self(
            $geo,
            $title,
            $address,
            $provider,
            $venueId,
            $venueType,
            $replyMarkup
        );
    }
}