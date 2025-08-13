<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webPageAttributeUniqueStarGift
 */
final class WebPageAttributeUniqueStarGift extends AbstractWebPageAttribute
{
    public const CONSTRUCTOR_ID = 0xcf6f6db8;
    
    public string $predicate = 'webPageAttributeUniqueStarGift';
    
    /**
     * @param AbstractStarGift $gift
     */
    public function __construct(
        public readonly AbstractStarGift $gift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->gift->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $gift = AbstractStarGift::deserialize($stream);

        return new self(
            $gift
        );
    }
}