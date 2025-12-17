<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageMediaWebPage
 */
final class InputBotInlineMessageMediaWebPage extends AbstractInputBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0xbddcc510;
    
    public string $predicate = 'inputBotInlineMessageMediaWebPage';
    
    /**
     * @param string $message
     * @param string $url
     * @param true|null $invertMedia
     * @param true|null $forceLargeMedia
     * @param true|null $forceSmallMedia
     * @param true|null $optional
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $message,
        public readonly string $url,
        public readonly ?true $invertMedia = null,
        public readonly ?true $forceLargeMedia = null,
        public readonly ?true $forceSmallMedia = null,
        public readonly ?true $optional = null,
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
        if ($this->optional) {
            $flags |= (1 << 6);
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $invertMedia = (($flags & (1 << 3)) !== 0) ? true : null;
        $forceLargeMedia = (($flags & (1 << 4)) !== 0) ? true : null;
        $forceSmallMedia = (($flags & (1 << 5)) !== 0) ? true : null;
        $optional = (($flags & (1 << 6)) !== 0) ? true : null;
        $message = Deserializer::bytes($__payload, $__offset);
        $entities = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']) : null;
        $url = Deserializer::bytes($__payload, $__offset);
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($__payload, $__offset) : null;

        return new self(
            $message,
            $url,
            $invertMedia,
            $forceLargeMedia,
            $forceSmallMedia,
            $optional,
            $entities,
            $replyMarkup
        );
    }
}