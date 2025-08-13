<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/emailVerifyPurposeLoginSetup
 */
final class EmailVerifyPurposeLoginSetup extends AbstractEmailVerifyPurpose
{
    public const CONSTRUCTOR_ID = 0x4345be73;
    
    public string $predicate = 'emailVerifyPurposeLoginSetup';
    
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $phoneNumber = Deserializer::bytes($stream);
        $phoneCodeHash = Deserializer::bytes($stream);

        return new self(
            $phoneNumber,
            $phoneCodeHash
        );
    }
}