<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockCover
 */
final class PageBlockCover extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 972174080;
    
    public string $_ = 'pageBlockCover';
    
    /**
     * @param AbstractPageBlock $cover
     */
    public function __construct(
        public readonly AbstractPageBlock $cover
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->cover->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $cover = AbstractPageBlock::deserialize($deserializer, $stream);
            return new self(
            $cover
        );
    }
}