<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.passportConfig
 */
final class PassportConfig extends AbstractPassportConfig
{
    public const CONSTRUCTOR_ID = 0xa098d6af;
    
    public string $predicate = 'help.passportConfig';
    
    /**
     * @param int $hash
     * @param array $countriesLangs
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $countriesLangs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::serializeDataJSON($this->countriesLangs);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $hash = Deserializer::int32($__payload, $__offset);
        $countriesLangs = Deserializer::deserializeDataJSON($__payload, $__offset);

        return new self(
            $hash,
            $countriesLangs
        );
    }
}