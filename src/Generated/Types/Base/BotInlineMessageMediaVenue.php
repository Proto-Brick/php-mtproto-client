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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->geo->serialize();
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $geo = AbstractGeoPoint::deserialize($stream);
        $title = Deserializer::bytes($stream);
        $address = Deserializer::bytes($stream);
        $provider = Deserializer::bytes($stream);
        $venueId = Deserializer::bytes($stream);
        $venueType = Deserializer::bytes($stream);
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($stream) : null;
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