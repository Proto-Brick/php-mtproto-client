<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/availableEffect
 */
final class AvailableEffect extends AbstractAvailableEffect
{
    public const CONSTRUCTOR_ID = 2479088254;
    
    public string $_ = 'availableEffect';
    
    /**
     * @param int $id
     * @param string $emoticon
     * @param int $effectStickerId
     * @param bool|null $premiumRequired
     * @param int|null $staticIconId
     * @param int|null $effectAnimationId
     */
    public function __construct(
        public readonly int $id,
        public readonly string $emoticon,
        public readonly int $effectStickerId,
        public readonly ?bool $premiumRequired = null,
        public readonly ?int $staticIconId = null,
        public readonly ?int $effectAnimationId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premiumRequired) $flags |= (1 << 2);
        if ($this->staticIconId !== null) $flags |= (1 << 0);
        if ($this->effectAnimationId !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->bytes($this->emoticon);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->staticIconId);
        }
        $buffer .= $serializer->int64($this->effectStickerId);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int64($this->effectAnimationId);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $premiumRequired = ($flags & (1 << 2)) ? true : null;
        $id = $deserializer->int64($stream);
        $emoticon = $deserializer->bytes($stream);
        $staticIconId = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $effectStickerId = $deserializer->int64($stream);
        $effectAnimationId = ($flags & (1 << 1)) ? $deserializer->int64($stream) : null;
            return new self(
            $id,
            $emoticon,
            $effectStickerId,
            $premiumRequired,
            $staticIconId,
            $effectAnimationId
        );
    }
}