<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageTableCell
 */
final class PageTableCell extends AbstractPageTableCell
{
    public const CONSTRUCTOR_ID = 878078826;
    
    public string $_ = 'pageTableCell';
    
    /**
     * @param bool|null $header
     * @param bool|null $alignCenter
     * @param bool|null $alignRight
     * @param bool|null $valignMiddle
     * @param bool|null $valignBottom
     * @param AbstractRichText|null $text
     * @param int|null $colspan
     * @param int|null $rowspan
     */
    public function __construct(
        public readonly ?bool $header = null,
        public readonly ?bool $alignCenter = null,
        public readonly ?bool $alignRight = null,
        public readonly ?bool $valignMiddle = null,
        public readonly ?bool $valignBottom = null,
        public readonly ?AbstractRichText $text = null,
        public readonly ?int $colspan = null,
        public readonly ?int $rowspan = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->header) $flags |= (1 << 0);
        if ($this->alignCenter) $flags |= (1 << 3);
        if ($this->alignRight) $flags |= (1 << 4);
        if ($this->valignMiddle) $flags |= (1 << 5);
        if ($this->valignBottom) $flags |= (1 << 6);
        if ($this->text !== null) $flags |= (1 << 7);
        if ($this->colspan !== null) $flags |= (1 << 1);
        if ($this->rowspan !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 7)) {
            $buffer .= $this->text->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->colspan);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->rowspan);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $header = ($flags & (1 << 0)) ? true : null;
        $alignCenter = ($flags & (1 << 3)) ? true : null;
        $alignRight = ($flags & (1 << 4)) ? true : null;
        $valignMiddle = ($flags & (1 << 5)) ? true : null;
        $valignBottom = ($flags & (1 << 6)) ? true : null;
        $text = ($flags & (1 << 7)) ? AbstractRichText::deserialize($deserializer, $stream) : null;
        $colspan = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $rowspan = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
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