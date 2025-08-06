<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionSecureValuesSentMe
 */
final class MessageActionSecureValuesSentMe extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x1b287353;
    
    public string $_ = 'messageActionSecureValuesSentMe';
    
    /**
     * @param list<SecureValue> $values
     * @param SecureCredentialsEncrypted $credentials
     */
    public function __construct(
        public readonly array $values,
        public readonly SecureCredentialsEncrypted $credentials
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->values);
        $buffer .= $this->credentials->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $values = $deserializer->vectorOfObjects($stream, [SecureValue::class, 'deserialize']);
        $credentials = SecureCredentialsEncrypted::deserialize($deserializer, $stream);
        return new self(
            $values,
            $credentials
        );
    }
}