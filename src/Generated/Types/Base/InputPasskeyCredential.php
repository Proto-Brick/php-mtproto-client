<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputPasskeyCredentialPublicKey
 */
final class InputPasskeyCredential extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3c27b78f;
    
    public string $predicate = 'inputPasskeyCredentialPublicKey';
    
    /**
     * @param string $id
     * @param string $rawId
     * @param AbstractInputPasskeyResponse $response
     */
    public function __construct(
        public readonly string $id,
        public readonly string $rawId,
        public readonly AbstractInputPasskeyResponse $response
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->rawId);
        $buffer .= $this->response->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::bytes($__payload, $__offset);
        $rawId = Deserializer::bytes($__payload, $__offset);
        $response = AbstractInputPasskeyResponse::deserialize($__payload, $__offset);

        return new self(
            $id,
            $rawId,
            $response
        );
    }
}