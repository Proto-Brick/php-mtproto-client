<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updates.channelDifferenceEmpty
 */
final class ChannelDifferenceEmpty extends AbstractChannelDifference
{
    public const CONSTRUCTOR_ID = 1041346555;
    
    public string $_ = 'updates.channelDifferenceEmpty';
    
    /**
     * @param int $pts
     * @param bool|null $final_
     * @param int|null $timeout
     */
    public function __construct(
        public readonly int $pts,
        public readonly ?bool $final_ = null,
        public readonly ?int $timeout = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->final_) $flags |= (1 << 0);
        if ($this->timeout !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->pts);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->timeout);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $final_ = ($flags & (1 << 0)) ? true : null;
        $pts = $deserializer->int32($stream);
        $timeout = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $pts,
            $final_,
            $timeout
        );
    }
}