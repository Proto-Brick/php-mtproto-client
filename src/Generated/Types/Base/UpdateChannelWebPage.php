<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannelWebPage
 */
final class UpdateChannelWebPage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2f2ba99f;
    
    public string $predicate = 'updateChannelWebPage';
    
    /**
     * @param int $channelId
     * @param AbstractWebPage $webpage
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly int $channelId,
        public readonly AbstractWebPage $webpage,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= $this->webpage->serialize();
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $channelId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $webpage = AbstractWebPage::deserialize($stream);
        $pts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $ptsCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $channelId,
            $webpage,
            $pts,
            $ptsCount
        );
    }
}