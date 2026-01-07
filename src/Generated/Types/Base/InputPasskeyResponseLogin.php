<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPasskeyResponseLogin
 */
final class InputPasskeyResponseLogin extends AbstractInputPasskeyResponse
{
    public const CONSTRUCTOR_ID = 0xc31fc14a;
    
    public string $predicate = 'inputPasskeyResponseLogin';
    
    /**
     * @param array $clientData
     * @param string $authenticatorData
     * @param string $signature
     * @param string $userHandle
     */
    public function __construct(
        public readonly array $clientData,
        public readonly string $authenticatorData,
        public readonly string $signature,
        public readonly string $userHandle
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->clientData);
        $buffer .= Serializer::bytes($this->authenticatorData);
        $buffer .= Serializer::bytes($this->signature);
        $buffer .= Serializer::bytes($this->userHandle);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $clientData = Deserializer::deserializeDataJSON($__payload, $__offset);
        $authenticatorData = Deserializer::bytes($__payload, $__offset);
        $signature = Deserializer::bytes($__payload, $__offset);
        $userHandle = Deserializer::bytes($__payload, $__offset);

        return new self(
            $clientData,
            $authenticatorData,
            $signature,
            $userHandle
        );
    }
}