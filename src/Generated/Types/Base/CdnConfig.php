<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/cdnConfig
 */
final class CdnConfig extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5725e40a;
    
    public string $_ = 'cdnConfig';
    
    /**
     * @param list<CdnPublicKey> $publicKeys
     */
    public function __construct(
        public readonly array $publicKeys
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->publicKeys);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $publicKeys = $deserializer->vectorOfObjects($stream, [CdnPublicKey::class, 'deserialize']);
        return new self(
            $publicKeys
        );
    }
}