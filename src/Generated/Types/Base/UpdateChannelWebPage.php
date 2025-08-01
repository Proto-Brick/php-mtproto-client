<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelWebPage
 */
final class UpdateChannelWebPage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 791390623;
    
    public string $_ = 'updateChannelWebPage';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->channelId);
        $buffer .= $this->webpage->serialize($serializer);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channelId = $deserializer->int64($stream);
        $webpage = AbstractWebPage::deserialize($deserializer, $stream);
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
            return new self(
            $channelId,
            $webpage,
            $pts,
            $ptsCount
        );
    }
}