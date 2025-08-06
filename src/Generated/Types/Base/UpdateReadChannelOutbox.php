<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateReadChannelOutbox
 */
final class UpdateReadChannelOutbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb75f99a9;
    
    public string $_ = 'updateReadChannelOutbox';
    
    /**
     * @param int $channelId
     * @param int $maxId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $maxId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->channelId);
        $buffer .= $serializer->int32($this->maxId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channelId = $deserializer->int64($stream);
        $maxId = $deserializer->int32($stream);
        return new self(
            $channelId,
            $maxId
        );
    }
}