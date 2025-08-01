<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelAvailableMessages
 */
final class UpdateChannelAvailableMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2990524056;
    
    public string $_ = 'updateChannelAvailableMessages';
    
    /**
     * @param int $channelId
     * @param int $availableMinId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $availableMinId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->channelId);
        $buffer .= $serializer->int32($this->availableMinId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channelId = $deserializer->int64($stream);
        $availableMinId = $deserializer->int32($stream);
            return new self(
            $channelId,
            $availableMinId
        );
    }
}