<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/langPackStringPluralized
 */
final class LangPackStringPluralized extends AbstractLangPackString
{
    public const CONSTRUCTOR_ID = 0x6c47ac9f;
    
    public string $_ = 'langPackStringPluralized';
    
    /**
     * @param string $key
     * @param string $otherValue
     * @param string|null $zeroValue
     * @param string|null $oneValue
     * @param string|null $twoValue
     * @param string|null $fewValue
     * @param string|null $manyValue
     */
    public function __construct(
        public readonly string $key,
        public readonly string $otherValue,
        public readonly ?string $zeroValue = null,
        public readonly ?string $oneValue = null,
        public readonly ?string $twoValue = null,
        public readonly ?string $fewValue = null,
        public readonly ?string $manyValue = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->zeroValue !== null) $flags |= (1 << 0);
        if ($this->oneValue !== null) $flags |= (1 << 1);
        if ($this->twoValue !== null) $flags |= (1 << 2);
        if ($this->fewValue !== null) $flags |= (1 << 3);
        if ($this->manyValue !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->key);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->zeroValue);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->oneValue);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->twoValue);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->fewValue);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->manyValue);
        }
        $buffer .= Serializer::bytes($this->otherValue);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $key = Deserializer::bytes($stream);
        $zeroValue = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $oneValue = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $twoValue = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $fewValue = ($flags & (1 << 3)) ? Deserializer::bytes($stream) : null;
        $manyValue = ($flags & (1 << 4)) ? Deserializer::bytes($stream) : null;
        $otherValue = Deserializer::bytes($stream);
        return new self(
            $key,
            $otherValue,
            $zeroValue,
            $oneValue,
            $twoValue,
            $fewValue,
            $manyValue
        );
    }
}