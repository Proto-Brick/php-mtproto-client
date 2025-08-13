<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/botInlineMessageMediaWebPage
 */
final class BotInlineMessageMediaWebPage extends AbstractBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x809ad9a6;
    
    public string $predicate = 'botInlineMessageMediaWebPage';
    
    /**
     * @param string $message
     * @param string $url
     * @param true|null $invertMedia
     * @param true|null $forceLargeMedia
     * @param true|null $forceSmallMedia
     * @param true|null $manual
     * @param true|null $safe
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $message,
        public readonly string $url,
        public readonly ?true $invertMedia = null,
        public readonly ?true $forceLargeMedia = null,
        public readonly ?true $forceSmallMedia = null,
        public readonly ?true $manual = null,
        public readonly ?true $safe = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->invertMedia) {
            $flags |= (1 << 3);
        }
        if ($this->forceLargeMedia) {
            $flags |= (1 << 4);
        }
        if ($this->forceSmallMedia) {
            $flags |= (1 << 5);
        }
        if ($this->manual) {
            $flags |= (1 << 7);
        }
        if ($this->safe) {
            $flags |= (1 << 8);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 1);
        }
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        $buffer .= Serializer::bytes($this->url);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $invertMedia = (($flags & (1 << 3)) !== 0) ? true : null;
        $forceLargeMedia = (($flags & (1 << 4)) !== 0) ? true : null;
        $forceSmallMedia = (($flags & (1 << 5)) !== 0) ? true : null;
        $manual = (($flags & (1 << 7)) !== 0) ? true : null;
        $safe = (($flags & (1 << 8)) !== 0) ? true : null;
        $message = Deserializer::bytes($stream);
        $entities = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $url = Deserializer::bytes($stream);
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($stream) : null;

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