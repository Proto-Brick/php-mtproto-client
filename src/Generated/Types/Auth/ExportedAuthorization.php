<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.exportedAuthorization
 */
final class ExportedAuthorization extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb434e2b8;
    
    public string $_ = 'auth.exportedAuthorization';
    
    /**
     * @param int $id
     * @param string $bytes
     */
    public function __construct(
        public readonly int $id,
        public readonly string $bytes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $id = $deserializer->int64($stream);
        $bytes = $deserializer->bytes($stream);
        return new self(
            $id,
            $bytes
        );
    }
}