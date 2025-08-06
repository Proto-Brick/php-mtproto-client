<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelMessageViews
 */
final class UpdateChannelMessageViews extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf226ac08;
    
    public string $_ = 'updateChannelMessageViews';
    
    /**
     * @param int $channelId
     * @param int $id
     * @param int $views
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $id,
        public readonly int $views
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->channelId);
        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->int32($this->views);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channelId = $deserializer->int64($stream);
        $id = $deserializer->int32($stream);
        $views = $deserializer->int32($stream);
        return new self(
            $channelId,
            $id,
            $views
        );
    }
}