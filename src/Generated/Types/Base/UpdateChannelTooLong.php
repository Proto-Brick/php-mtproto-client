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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pts !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->pts);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $channelId = Deserializer::int64($stream);
        $pts = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        return new self(
            $channelId,
            $pts
        );
    }
}