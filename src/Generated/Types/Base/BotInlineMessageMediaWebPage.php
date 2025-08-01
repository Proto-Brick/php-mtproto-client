<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botInlineMessageMediaWebPage
 */
final class BotInlineMessageMediaWebPage extends AbstractBotInlineMessage
{
    public const CONSTRUCTOR_ID = 2157631910;
    
    public string $_ = 'botInlineMessageMediaWebPage';
    
    /**
     * @param string $message
     * @param string $url
     * @param bool|null $invertMedia
     * @param bool|null $forceLargeMedia
     * @param bool|null $forceSmallMedia
     * @param bool|null $manual
     * @param bool|null $safe
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $message,
        public readonly string $url,
        public readonly ?bool $invertMedia = null,
        public readonly ?bool $forceLargeMedia = null,
        public readonly ?bool $forceSmallMedia = null,
        public readonly ?bool $manual = null,
        public readonly ?bool $safe = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->invertMedia) $flags |= (1 << 3);
        if ($this->forceLargeMedia) $flags |= (1 << 4);
        if ($this->forceSmallMedia) $flags |= (1 << 5);
        if ($this->manual) $flags |= (1 << 7);
        if ($this->safe) $flags |= (1 << 8);
        if ($this->entities !== null) $flags |= (1 << 1);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        $buffer .= $serializer->bytes($this->url);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $invertMedia = ($flags & (1 << 3)) ? true : null;
        $forceLargeMedia = ($flags & (1 << 4)) ? true : null;
        $forceSmallMedia = ($flags & (1 << 5)) ? true : null;
        $manual = ($flags & (1 << 7)) ? true : null;
        $safe = ($flags & (1 << 8)) ? true : null;
        $message = $deserializer->bytes($stream);
        $entities = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $url = $deserializer->bytes($stream);
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
            return new self(
            $message,
            $url,
            $invertMedia,
            $forceLargeMedia,
            $forceSmallMedia,
            $manual,
            $safe,
            $entities,
            $replyMarkup
        );
    }
}