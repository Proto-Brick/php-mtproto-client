<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/mediaAreaChannelPost
 */
final class MediaAreaChannelPost extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0x770416af;
    
    public string $predicate = 'mediaAreaChannelPost';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param int $channelId
     * @param int $msgId
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly int $channelId,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize();
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->msgId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $channelId = Deserializer::int64($stream);
        $msgId = Deserializer::int32($stream);

        return new self(
            $coordinates,
            $channelId,
            $msgId
        );
    }
}