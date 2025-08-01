<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractAuthorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.importWebTokenAuthorization
 */
final class ImportWebTokenAuthorizationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 767062953;
    
    public string $_ = 'auth.importWebTokenAuthorization';
    
    public function getMethodName(): string
    {
        return 'auth.importWebTokenAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param int $apiId
     * @param string $apiHash
     * @param string $webAuthToken
     */
    public function __construct(
        public readonly int $apiId,
        public readonly string $apiHash,
        public readonly string $webAuthToken
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->apiId);
        $buffer .= $serializer->bytes($this->apiHash);
        $buffer .= $serializer->bytes($this->webAuthToken);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}