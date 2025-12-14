<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/botInlineMessageText
 */
final class BotInlineMessageText extends AbstractBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x8c7f65e2;
    
    public string $predicate = 'botInlineMessageText';
    
    /**
     * @param string $message
     * @param true|null $noWebpage
     * @param true|null $invertMedia
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $message,
        public readonly ?true $noWebpage = null,
        public readonly ?true $invertMedia = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) {
            $flags |= (1 << 0);
        }
        if ($this->invertMedia) {
            $flags |= (1 << 3);
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
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $noWebpage = (($flags & (1 << 0)) !== 0) ? true : null;
        $invertMedia = (($flags & (1 << 3)) !== 0) ? true : null;
        $message = Deserializer::bytes($stream);
        $entities = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($stream) : null;

        return new self(
            $message,
            $noWebpage,
            $invertMedia,
            $entities,
            $replyMarkup
        );
    }
}