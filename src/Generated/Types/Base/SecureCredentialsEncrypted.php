<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureCredentialsEncrypted
 */
final class SecureCredentialsEncrypted extends TlObject
{
    public const CONSTRUCTOR_ID = 0x33f0ea47;
    
    public string $predicate = 'secureCredentialsEncrypted';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->data);
        $buffer .= Serializer::bytes($this->hash);
        $buffer .= Serializer::bytes($this->secret);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $data = Deserializer::bytes($stream);
        $hash = Deserializer::bytes($stream);
        $secret = Deserializer::bytes($stream);

        return new self(
            $data,
            $hash,
            $secret
        );
    }
}