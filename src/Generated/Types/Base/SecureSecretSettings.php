<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureSecretSettings
 */
final class SecureSecretSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1527bcac;
    
    public string $predicate = 'secureSecretSettings';
    
    /**
     * @param AbstractSecurePasswordKdfAlgo $secureAlgo
     * @param string $secureSecret
     * @param int $secureSecretId
     */
    public function __construct(
        public readonly AbstractSecurePasswordKdfAlgo $secureAlgo,
        public readonly string $secureSecret,
        public readonly int $secureSecretId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->secureAlgo->serialize();
        $buffer .= Serializer::bytes($this->secureSecret);
        $buffer .= Serializer::int64($this->secureSecretId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $secureAlgo = AbstractSecurePasswordKdfAlgo::deserialize($stream);
        $secureSecret = Deserializer::bytes($stream);
        $secureSecretId = Deserializer::int64($stream);

        return new self(
            $secureAlgo,
            $secureSecret,
            $secureSecretId
        );
    }
}