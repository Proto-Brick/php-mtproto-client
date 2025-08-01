<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botInlineMessageMediaAuto
 */
final class BotInlineMessageMediaAuto extends AbstractBotInlineMessage
{
    public const CONSTRUCTOR_ID = 1984755728;
    
    public string $_ = 'botInlineMessageMediaAuto';
    
    /**
     * @param string $message
     * @param bool|null $invertMedia
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $message,
        public readonly ?bool $invertMedia = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->invertMedia) $flags |= (1 << 3);
        if ($this->entities !== null) $flags |= (1 << 1);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
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

        $invertMedia = ($flags & (1 << 3)) ? true : null;
        $message = $deserializer->bytes($stream);
        $entities = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
            return new self(
            $message,
            $invertMedia,
            $entities,
            $replyMarkup
        );
    }
}