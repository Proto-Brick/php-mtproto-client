<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureData
 */
final class SecureData extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8aeabec3;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

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