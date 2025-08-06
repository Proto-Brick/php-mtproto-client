<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGeoPoint;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.editLocation
 */
final class EditLocationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x58e63f6d;
    
    public string $_ = 'channels.editLocation';
    
    public function getMethodName(): string
    {
        return 'channels.editLocation';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputGeoPoint $geoPoint
     * @param string $address
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly string $address
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $this->geoPoint->serialize($serializer);
        $buffer .= $serializer->bytes($this->address);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}