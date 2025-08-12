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
    
    public string $predicate = 'factCheck';
    
    /**
     * @param int $hash
     * @param true|null $needCheck
     * @param string|null $country
     * @param TextWithEntities|null $text
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?true $needCheck = null,
        public readonly ?string $country = null,
        public readonly ?TextWithEntities $text = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->needCheck) $flags |= (1 << 0);
        if ($this->country !== null) $flags |= (1 << 1);
        if ($this->text !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->country);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->text->serialize();
        }
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $needCheck = ($flags & (1 << 0)) ? true : null;
        $country = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $text = ($flags & (1 << 1)) ? TextWithEntities::deserialize($stream) : null;
        $hash = Deserializer::int64($stream);

        return new self(
            $hash,
            $needCheck,
            $country,
            $text
        );
    }
}