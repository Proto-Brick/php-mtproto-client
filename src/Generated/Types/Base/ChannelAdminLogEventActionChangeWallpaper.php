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
    public const CONSTRUCTOR_ID = 0x31bb5d52;
    
    public string $_ = 'channelAdminLogEventActionChangeWallpaper';
    
    /**
     * @param AbstractWallPaper $prevValue
     * @param AbstractWallPaper $newValue
     */
    public function __construct(
        public readonly AbstractWallPaper $prevValue,
        public readonly AbstractWallPaper $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevValue->serialize();
        $buffer .= $this->newValue->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $prevValue = AbstractWallPaper::deserialize($stream);
        $newValue = AbstractWallPaper::deserialize($stream);
        return new self(
            $prevValue,
            $newValue
        );
    }
}