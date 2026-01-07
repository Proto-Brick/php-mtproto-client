<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageMediaAuto
 */
final class InputBotInlineMessageMediaAuto extends AbstractInputBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x3380c786;
    
    public string $predicate = 'inputBotInlineMessageMediaAuto';
    
    /**
     * @param string $message
     * @param true|null $invertMedia
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly string $message,
        public readonly ?true $invertMedia = null,
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $invertMedia = (($flags & (1 << 3)) !== 0) ? true : null;
        $message = Deserializer::bytes($__payload, $__offset);
        $entities = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']) : null;
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($__payload, $__offset) : null;

        return new self(
            $message,
            $invertMedia,
            $entities,
            $replyMarkup
        );
    }
}