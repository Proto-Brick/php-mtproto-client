<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeWallpaper
 */
final class ChannelAdminLogEventActionChangeWallpaper extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 834362706;
    
    public string $_ = 'channelAdminLogEventActionChangeWallpaper';
    
    /**
     * @param AbstractWallPaper $prevValue
     * @param AbstractWallPaper $newValue
     */
    public function __construct(
        public readonly AbstractWallPaper $prevValue,
        public readonly AbstractWallPaper $newValue
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevValue->serialize($serializer);
        $buffer .= $this->newValue->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevValue = AbstractWallPaper::deserialize($deserializer, $stream);
        $newValue = AbstractWallPaper::deserialize($deserializer, $stream);
            return new self(
            $prevValue,
            $newValue
        );
    }
}