<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangePhoto
 */
final class ChannelAdminLogEventActionChangePhoto extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x434bd2af;
    
    public string $_ = 'channelAdminLogEventActionChangePhoto';
    
    /**
     * @param AbstractPhoto $prevPhoto
     * @param AbstractPhoto $newPhoto
     */
    public function __construct(
        public readonly AbstractPhoto $prevPhoto,
        public readonly AbstractPhoto $newPhoto
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevPhoto->serialize($serializer);
        $buffer .= $this->newPhoto->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevPhoto = AbstractPhoto::deserialize($deserializer, $stream);
        $newPhoto = AbstractPhoto::deserialize($deserializer, $stream);
        return new self(
            $prevPhoto,
            $newPhoto
        );
    }
}