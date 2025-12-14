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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $countriesLangs = Deserializer::deserializeDataJSON($stream);

        return new self(
            $hash,
            $countriesLangs
        );
    }
}