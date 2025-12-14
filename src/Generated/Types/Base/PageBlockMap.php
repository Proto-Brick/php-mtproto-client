<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockMap
 */
final class PageBlockMap extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xa44f3ef6;
    
    public string $predicate = 'pageBlockMap';
    
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
        Deserializer::int32($stream); // Constructor ID
        $geo = AbstractGeoPoint::deserialize($stream);
        $zoom = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $w = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $h = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
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