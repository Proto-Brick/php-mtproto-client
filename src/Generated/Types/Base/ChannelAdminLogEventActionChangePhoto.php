<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangePhoto
 */
final class ChannelAdminLogEventActionChangePhoto extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x434bd2af;
    
    public string $predicate = 'channelAdminLogEventActionChangePhoto';
    
    /**
     * @param AbstractPhoto $prevPhoto
     * @param AbstractPhoto $newPhoto
     */
    public function __construct(
        public readonly AbstractPhoto $prevPhoto,
        public readonly AbstractPhoto $newPhoto
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevPhoto->serialize();
        $buffer .= $this->newPhoto->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevPhoto = AbstractPhoto::deserialize($stream);
        $newPhoto = AbstractPhoto::deserialize($stream);

        return new self(
            $prevPhoto,
            $newPhoto
        );
    }
}