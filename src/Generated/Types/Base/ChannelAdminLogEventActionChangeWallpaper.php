<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeWallpaper
 */
final class ChannelAdminLogEventActionChangeWallpaper extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x31bb5d52;
    
    public string $predicate = 'channelAdminLogEventActionChangeWallpaper';
    
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
        Deserializer::int32($stream); // Constructor ID
        $prevValue = AbstractWallPaper::deserialize($stream);
        $newValue = AbstractWallPaper::deserialize($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}