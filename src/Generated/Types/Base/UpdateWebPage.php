<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateWebPage
 */
final class UpdateWebPage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7f891213;
    
    public string $_ = 'updateWebPage';
    
    /**
     * @param AbstractWebPage $webpage
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly AbstractWebPage $webpage,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->webpage->serialize($serializer);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $webpage = AbstractWebPage::deserialize($deserializer, $stream);
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
        return new self(
            $webpage,
            $pts,
            $ptsCount
        );
    }
}