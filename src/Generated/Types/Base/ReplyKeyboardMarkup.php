<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/replyKeyboardMarkup
 */
final class ReplyKeyboardMarkup extends AbstractReplyMarkup
{
    public const CONSTRUCTOR_ID = 0x85dd99d1;
    
    public string $_ = 'replyKeyboardMarkup';
    
    /**
     * @param list<KeyboardButtonRow> $rows
     * @param bool|null $resize
     * @param bool|null $singleUse
     * @param bool|null $selective
     * @param bool|null $persistent
     * @param string|null $placeholder
     */
    public function __construct(
        public readonly array $rows,
        public readonly ?bool $resize = null,
        public readonly ?bool $singleUse = null,
        public readonly ?bool $selective = null,
        public readonly ?bool $persistent = null,
        public readonly ?string $placeholder = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->resize) $flags |= (1 << 0);
        if ($this->singleUse) $flags |= (1 << 1);
        if ($this->selective) $flags |= (1 << 2);
        if ($this->persistent) $flags |= (1 << 4);
        if ($this->placeholder !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->rows);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->placeholder);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $resize = ($flags & (1 << 0)) ? true : null;
        $singleUse = ($flags & (1 << 1)) ? true : null;
        $selective = ($flags & (1 << 2)) ? true : null;
        $persistent = ($flags & (1 << 4)) ? true : null;
        $rows = $deserializer->vectorOfObjects($stream, [KeyboardButtonRow::class, 'deserialize']);
        $placeholder = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
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