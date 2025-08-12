<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storiesStealthMode
 */
final class StoriesStealthMode extends TlObject
{
    public const CONSTRUCTOR_ID = 0x712e27fd;
    
    public string $predicate = 'storiesStealthMode';
    
    /**
     * @param int|null $activeUntilDate
     * @param int|null $cooldownUntilDate
     */
    public function __construct(
        public readonly ?int $activeUntilDate = null,
        public readonly ?int $cooldownUntilDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->activeUntilDate !== null) $flags |= (1 << 0);
        if ($this->cooldownUntilDate !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->activeUntilDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->cooldownUntilDate);
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
        $activeUntilDate = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $cooldownUntilDate = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;

        return new self(
            $activeUntilDate,
            $cooldownUntilDate
        );
    }
}