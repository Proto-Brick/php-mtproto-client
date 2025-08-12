<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botAppSettings
 */
final class BotAppSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc99b1950;
    
    public string $predicate = 'botAppSettings';
    
    /**
     * @param string|null $placeholderPath
     * @param int|null $backgroundColor
     * @param int|null $backgroundDarkColor
     * @param int|null $headerColor
     * @param int|null $headerDarkColor
     */
    public function __construct(
        public readonly ?string $placeholderPath = null,
        public readonly ?int $backgroundColor = null,
        public readonly ?int $backgroundDarkColor = null,
        public readonly ?int $headerColor = null,
        public readonly ?int $headerDarkColor = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->placeholderPath !== null) $flags |= (1 << 0);
        if ($this->backgroundColor !== null) $flags |= (1 << 1);
        if ($this->backgroundDarkColor !== null) $flags |= (1 << 2);
        if ($this->headerColor !== null) $flags |= (1 << 3);
        if ($this->headerDarkColor !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->placeholderPath);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->backgroundColor);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->backgroundDarkColor);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->headerColor);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->headerDarkColor);
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
        $placeholderPath = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $backgroundColor = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $backgroundDarkColor = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $headerColor = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $headerDarkColor = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;

        return new self(
            $placeholderPath,
            $backgroundColor,
            $backgroundDarkColor,
            $headerColor,
            $headerDarkColor
        );
    }
}