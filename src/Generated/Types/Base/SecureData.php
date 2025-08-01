<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureData
 */
final class SecureData extends AbstractSecureData
{
    public const CONSTRUCTOR_ID = 2330640067;
    
    public string $_ = 'secureData';
    
    /**
     * @param string $data
     * @param string $dataHash
     * @param string $secret
     */
    public function __construct(
        public readonly string $data,
        public readonly string $dataHash,
        public readonly string $secret
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->data);
        $buffer .= $serializer->bytes($this->dataHash);
        $buffer .= $serializer->bytes($this->secret);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $data = $deserializer->bytes($stream);
        $dataHash = $deserializer->bytes($stream);
        $secret = $deserializer->bytes($stream);
            return new self(
            $data,
            $dataHash,
            $secret
        );
    }
}