<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPasskeyResponseRegister
 */
final class InputPasskeyResponseRegister extends AbstractInputPasskeyResponse
{
    public const CONSTRUCTOR_ID = 0x3e63935c;
    
    public string $predicate = 'inputPasskeyResponseRegister';
    
    /**
     * @param array $clientData
     * @param string $attestationData
     */
    public function __construct(
        public readonly array $clientData,
        public readonly string $attestationData
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->clientData);
        $buffer .= Serializer::bytes($this->attestationData);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $clientData = Deserializer::deserializeDataJSON($__payload, $__offset);
        $attestationData = Deserializer::bytes($__payload, $__offset);

        return new self(
            $clientData,
            $attestationData
        );
    }
}