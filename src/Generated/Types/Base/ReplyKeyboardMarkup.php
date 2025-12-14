<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/replyKeyboardMarkup
 */
final class ReplyKeyboardMarkup extends AbstractReplyMarkup
{
    public const CONSTRUCTOR_ID = 0x85dd99d1;
    
    public string $predicate = 'replyKeyboardMarkup';
    
    /**
     * @param list<KeyboardButtonRow> $rows
     * @param true|null $resize
     * @param true|null $singleUse
     * @param true|null $selective
     * @param true|null $persistent
     * @param string|null $placeholder
     */
    public function __construct(
        public readonly array $rows,
        public readonly ?true $resize = null,
        public readonly ?true $singleUse = null,
        public readonly ?true $selective = null,
        public readonly ?true $persistent = null,
        public readonly ?string $placeholder = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->resize) {
            $flags |= (1 << 0);
        }
        if ($this->singleUse) {
            $flags |= (1 << 1);
        }
        if ($this->selective) {
            $flags |= (1 << 2);
        }
        if ($this->persistent) {
            $flags |= (1 << 4);
        }
        if ($this->placeholder !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->rows);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->placeholder);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $resize = (($flags & (1 << 0)) !== 0) ? true : null;
        $singleUse = (($flags & (1 << 1)) !== 0) ? true : null;
        $selective = (($flags & (1 << 2)) !== 0) ? true : null;
        $persistent = (($flags & (1 << 4)) !== 0) ? true : null;
        $rows = Deserializer::vectorOfObjects($stream, [KeyboardButtonRow::class, 'deserialize']);
        $placeholder = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($stream) : null;

        return new self(
            $rows,
            $resize,
            $singleUse,
            $selective,
            $persistent,
            $placeholder
        );
    }
}