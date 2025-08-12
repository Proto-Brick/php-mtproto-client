<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/availableEffect
 */
final class AvailableEffect extends TlObject
{
    public const CONSTRUCTOR_ID = 0x93c3e27e;
    
    public string $predicate = 'availableEffect';
    
    /**
     * @param int $id
     * @param string $emoticon
     * @param int $effectStickerId
     * @param true|null $premiumRequired
     * @param int|null $staticIconId
     * @param int|null $effectAnimationId
     */
    public function __construct(
        public readonly int $id,
        public readonly string $emoticon,
        public readonly int $effectStickerId,
        public readonly ?true $premiumRequired = null,
        public readonly ?int $staticIconId = null,
        public readonly ?int $effectAnimationId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premiumRequired) $flags |= (1 << 2);
        if ($this->staticIconId !== null) $flags |= (1 << 0);
        if ($this->effectAnimationId !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->emoticon);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->staticIconId);
        }
        $buffer .= Serializer::int64($this->effectStickerId);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->effectAnimationId);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $premiumRequired = ($flags & (1 << 2)) ? true : null;
        $id = Deserializer::int64($stream);
        $emoticon = Deserializer::bytes($stream);
        $staticIconId = ($flags & (1 << 0)) ? Deserializer::int64($stream) : null;
        $effectStickerId = Deserializer::int64($stream);
        $effectAnimationId = ($flags & (1 << 1)) ? Deserializer::int64($stream) : null;

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