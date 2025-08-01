<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storiesStealthMode
 */
final class StoriesStealthMode extends AbstractStoriesStealthMode
{
    public const CONSTRUCTOR_ID = 1898850301;
    
    public string $_ = 'storiesStealthMode';
    
    /**
     * @param int|null $activeUntilDate
     * @param int|null $cooldownUntilDate
     */
    public function __construct(
        public readonly ?int $activeUntilDate = null,
        public readonly ?int $cooldownUntilDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->activeUntilDate !== null) $flags |= (1 << 0);
        if ($this->cooldownUntilDate !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->activeUntilDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->cooldownUntilDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $activeUntilDate = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $cooldownUntilDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $activeUntilDate,
            $cooldownUntilDate
        );
    }
}