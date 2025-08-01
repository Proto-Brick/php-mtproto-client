<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/cdnPublicKey
 */
final class CdnPublicKey extends AbstractCdnPublicKey
{
    public const CONSTRUCTOR_ID = 3380800186;
    
    public string $_ = 'cdnPublicKey';
    
    /**
     * @param int $dcId
     * @param string $publicKey
     */
    public function __construct(
        public readonly int $dcId,
        public readonly string $publicKey
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->dcId);
        $buffer .= $serializer->bytes($this->publicKey);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $dcId = $deserializer->int32($stream);
        $publicKey = $deserializer->bytes($stream);
            return new self(
            $dcId,
            $publicKey
        );
    }
}