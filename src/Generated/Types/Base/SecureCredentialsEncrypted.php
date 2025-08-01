<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureCredentialsEncrypted
 */
final class SecureCredentialsEncrypted extends AbstractSecureCredentialsEncrypted
{
    public const CONSTRUCTOR_ID = 871426631;
    
    public string $_ = 'secureCredentialsEncrypted';
    
    /**
     * @param string $data
     * @param string $hash
     * @param string $secret
     */
    public function __construct(
        public readonly string $data,
        public readonly string $hash,
        public readonly string $secret
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->data);
        $buffer .= $serializer->bytes($this->hash);
        $buffer .= $serializer->bytes($this->secret);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $data = $deserializer->bytes($stream);
        $hash = $deserializer->bytes($stream);
        $secret = $deserializer->bytes($stream);
            return new self(
            $data,
            $hash,
            $secret
        );
    }
}