<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockMap
 */
final class PageBlockMap extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xa44f3ef6;
    
    public string $_ = 'pageBlockMap';
    
    /**
     * @param AbstractGeoPoint $geo
     * @param int $zoom
     * @param int $w
     * @param int $h
     * @param PageCaption $caption
     */
    public function __construct(
        public readonly AbstractGeoPoint $geo,
        public readonly int $zoom,
        public readonly int $w,
        public readonly int $h,
        public readonly PageCaption $caption
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geo->serialize();
        $buffer .= Serializer::int32($this->zoom);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        $buffer .= $this->caption->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $geo = AbstractGeoPoint::deserialize($stream);
        $zoom = Deserializer::int32($stream);
        $w = Deserializer::int32($stream);
        $h = Deserializer::int32($stream);
        $caption = PageCaption::deserialize($stream);
        return new self(
            $geo,
            $zoom,
            $w,
            $h,
            $caption
        );
    }
}