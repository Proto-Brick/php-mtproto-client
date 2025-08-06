<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockSlideshow
 */
final class PageBlockSlideshow extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x31f9590;
    
    public string $_ = 'pageBlockSlideshow';
    
    /**
     * @param list<AbstractPageBlock> $items
     * @param PageCaption $caption
     */
    public function __construct(
        public readonly array $items,
        public readonly PageCaption $caption
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->items);
        $buffer .= $this->caption->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $items = $deserializer->vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        $caption = PageCaption::deserialize($deserializer, $stream);
        return new self(
            $items,
            $caption
        );
    }
}