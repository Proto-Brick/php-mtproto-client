<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/cdnPublicKey
 */
final class CdnPublicKey extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc982eaba;
    
    public string $_ = 'cdnPublicKey';
    
    /**
     * @param int $dcId
     * @param string $publicKey
     */
    public function __construct(
        public readonly int $dcId,
        public readonly string $publicKey
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::bytes($this->publicKey);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $dcId = Deserializer::int32($stream);
        $publicKey = Deserializer::bytes($stream);
        return new self(
            $dcId,
            $publicKey
        );
    }
}