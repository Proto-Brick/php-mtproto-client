<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/factCheck
 */
final class FactCheck extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb89bfccf;
    
    public string $_ = 'factCheck';
    
    /**
     * @param int $hash
     * @param bool|null $needCheck
     * @param string|null $country
     * @param TextWithEntities|null $text
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?bool $needCheck = null,
        public readonly ?string $country = null,
        public readonly ?TextWithEntities $text = null
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $needCheck = ($flags & (1 << 0)) ? true : null;
        $country = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $text = ($flags & (1 << 1)) ? TextWithEntities::deserialize($deserializer, $stream) : null;
        $hash = $deserializer->int64($stream);
        return new self(
            $hash,
            $needCheck,
            $country,
            $text
        );
    }
}