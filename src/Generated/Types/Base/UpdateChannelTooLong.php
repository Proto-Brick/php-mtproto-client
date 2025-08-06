<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelTooLong
 */
final class UpdateChannelTooLong extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x108d941f;
    
    public string $_ = 'updateChannelTooLong';
    
    /**
     * @param int $channelId
     * @param int|null $pts
     */
    public function __construct(
        public readonly int $channelId,
        public readonly ?int $pts = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pts !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->pts);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $channelId = $deserializer->int64($stream);
        $pts = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        return new self(
            $channelId,
            $pts
        );
    }
}