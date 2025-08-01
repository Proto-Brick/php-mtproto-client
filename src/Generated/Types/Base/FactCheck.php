<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/factCheck
 */
final class FactCheck extends AbstractFactCheck
{
    public const CONSTRUCTOR_ID = 3097230543;
    
    public string $_ = 'factCheck';
    
    /**
     * @param int $hash
     * @param bool|null $needCheck
     * @param string|null $country
     * @param AbstractTextWithEntities|null $text
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?bool $needCheck = null,
        public readonly ?string $country = null,
        public readonly ?AbstractTextWithEntities $text = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->needCheck) $flags |= (1 << 0);
        if ($this->country !== null) $flags |= (1 << 1);
        if ($this->text !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->country);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->text->serialize($serializer);
        }
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $needCheck = ($flags & (1 << 0)) ? true : null;
        $country = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $text = ($flags & (1 << 1)) ? AbstractTextWithEntities::deserialize($deserializer, $stream) : null;
        $hash = $deserializer->int64($stream);
            return new self(
            $hash,
            $needCheck,
            $country,
            $text
        );
    }
}