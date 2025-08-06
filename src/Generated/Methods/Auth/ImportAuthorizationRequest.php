<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractAuthorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.importAuthorization
 */
final class ImportAuthorizationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa57a7dad;
    
    public string $_ = 'auth.importAuthorization';
    
    public function getMethodName(): string
    {
        return 'auth.importAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
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
        throw new \LogicException('Request objects are not deserializable');
    }
}