<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureSecretSettings
 */
final class SecureSecretSettings extends AbstractSecureSecretSettings
{
    public const CONSTRUCTOR_ID = 354925740;
    
    public string $_ = 'secureSecretSettings';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->secureAlgo->serialize($serializer);
        $buffer .= $serializer->bytes($this->secureSecret);
        $buffer .= $serializer->int64($this->secureSecretId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $secureAlgo = AbstractSecurePasswordKdfAlgo::deserialize($deserializer, $stream);
        $secureSecret = $deserializer->bytes($stream);
        $secureSecretId = $deserializer->int64($stream);
            return new self(
            $secureAlgo,
            $secureSecret,
            $secureSecretId
        );
    }
}