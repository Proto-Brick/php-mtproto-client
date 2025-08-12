<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageTableCell
 */
final class PageTableCell extends TlObject
{
    public const CONSTRUCTOR_ID = 0x34566b6a;
    
    public string $predicate = 'pageTableCell';
    
    /**
     * @param true|null $header
     * @param true|null $alignCenter
     * @param true|null $alignRight
     * @param true|null $valignMiddle
     * @param true|null $valignBottom
     * @param AbstractRichText|null $text
     * @param int|null $colspan
     * @param int|null $rowspan
     */
    public function __construct(
        public readonly ?true $header = null,
        public readonly ?true $alignCenter = null,
        public readonly ?true $alignRight = null,
        public readonly ?true $valignMiddle = null,
        public readonly ?true $valignBottom = null,
        public readonly ?AbstractRichText $text = null,
        public readonly ?int $colspan = null,
        public readonly ?int $rowspan = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->header) $flags |= (1 << 0);
        if ($this->alignCenter) $flags |= (1 << 3);
        if ($this->alignRight) $flags |= (1 << 4);
        if ($this->valignMiddle) $flags |= (1 << 5);
        if ($this->valignBottom) $flags |= (1 << 6);
        if ($this->text !== null) $flags |= (1 << 7);
        if ($this->colspan !== null) $flags |= (1 << 1);
        if ($this->rowspan !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 7)) {
            $buffer .= $this->text->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->colspan);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->rowspan);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $header = ($flags & (1 << 0)) ? true : null;
        $alignCenter = ($flags & (1 << 3)) ? true : null;
        $alignRight = ($flags & (1 << 4)) ? true : null;
        $valignMiddle = ($flags & (1 << 5)) ? true : null;
        $valignBottom = ($flags & (1 << 6)) ? true : null;
        $text = ($flags & (1 << 7)) ? AbstractRichText::deserialize($stream) : null;
        $colspan = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $rowspan = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;

        return new self(
            $header,
            $alignCenter,
            $alignRight,
            $valignMiddle,
            $valignBottom,
            $text,
            $colspan,
            $rowspan
        );
    }
}