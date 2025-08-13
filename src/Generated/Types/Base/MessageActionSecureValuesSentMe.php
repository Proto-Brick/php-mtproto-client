<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSecureValuesSentMe
 */
final class MessageActionSecureValuesSentMe extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x1b287353;
    
    public string $predicate = 'messageActionSecureValuesSentMe';
    
    /**
     * @param list<SecureValue> $values
     * @param SecureCredentialsEncrypted $credentials
     */
    public function __construct(
        public readonly array $values,
        public readonly SecureCredentialsEncrypted $credentials
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->values);
        $buffer .= $this->credentials->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $values = Deserializer::vectorOfObjects($stream, [SecureValue::class, 'deserialize']);
        $credentials = SecureCredentialsEncrypted::deserialize($stream);

        return new self(
            $values,
            $credentials
        );
    }
}