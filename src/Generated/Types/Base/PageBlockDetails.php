<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockDetails
 */
final class PageBlockDetails extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x76768bed;
    
    public string $_ = 'pageBlockDetails';
    
    /**
     * @param list<AbstractPageBlock> $blocks
     * @param AbstractRichText $title
     * @param bool|null $open
     */
    public function __construct(
        public readonly array $blocks,
        public readonly AbstractRichText $title,
        public readonly ?bool $open = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->open) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::vectorOfObjects($this->blocks);
        $buffer .= $this->title->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $open = ($flags & (1 << 0)) ? true : null;
        $blocks = Deserializer::vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        $title = AbstractRichText::deserialize($stream);
        return new self(
            $blocks,
            $title,
            $open
        );
    }
}