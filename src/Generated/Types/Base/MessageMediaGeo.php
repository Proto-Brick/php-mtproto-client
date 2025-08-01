<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaGeo
 */
final class MessageMediaGeo extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 1457575028;
    
    public string $_ = 'messageMediaGeo';
    
    /**
     * @param AbstractGeoPoint $geo
     */
    public function __construct(
        public readonly AbstractGeoPoint $geo
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geo->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $geo = AbstractGeoPoint::deserialize($deserializer, $stream);
            return new self(
            $geo
        );
    }
}