<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/cdnConfig
 */
final class CdnConfig extends AbstractCdnConfig
{
    public const CONSTRUCTOR_ID = 1462101002;
    
    public string $_ = 'cdnConfig';
    
    /**
     * @param list<AbstractCdnPublicKey> $publicKeys
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $publicKeys = $deserializer->vectorOfObjects($stream, [AbstractCdnPublicKey::class, 'deserialize']);
            return new self(
            $publicKeys
        );
    }
}