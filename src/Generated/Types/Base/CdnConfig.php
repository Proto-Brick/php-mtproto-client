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
    
    public string $predicate = 'cdnConfig';
    
    /**
     * @param list<CdnPublicKey> $publicKeys
     */
    public function __construct(
        public readonly array $publicKeys
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->publicKeys);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $publicKeys = Deserializer::vectorOfObjects($stream, [CdnPublicKey::class, 'deserialize']);

        return new self(
            $publicKeys
        );
    }
}