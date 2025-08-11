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
    public const CONSTRUCTOR_ID = 0x764cf810;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->invertMedia) $flags |= (1 << 3);
        if ($this->entities !== null) $flags |= (1 << 1);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $invertMedia = ($flags & (1 << 3)) ? true : null;
        $message = Deserializer::bytes($stream);
        $entities = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $replyMarkup = ($flags & (1 << 2)) ? AbstractReplyMarkup::deserialize($stream) : null;
        return new self(
            $message,
            $invertMedia,
            $entities,
            $replyMarkup
        );
    }
}