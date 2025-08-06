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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->zeroValue !== null) $flags |= (1 << 0);
        if ($this->oneValue !== null) $flags |= (1 << 1);
        if ($this->twoValue !== null) $flags |= (1 << 2);
        if ($this->fewValue !== null) $flags |= (1 << 3);
        if ($this->manyValue !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->key);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->zeroValue);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->oneValue);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->twoValue);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->fewValue);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->manyValue);
        }
        $buffer .= $serializer->bytes($this->otherValue);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $key = $deserializer->bytes($stream);
        $zeroValue = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $oneValue = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $twoValue = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $fewValue = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $manyValue = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
        $otherValue = $deserializer->bytes($stream);
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