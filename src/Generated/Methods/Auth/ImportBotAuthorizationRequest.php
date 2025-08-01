<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractAuthorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.importBotAuthorization
 */
final class ImportBotAuthorizationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1738800940;
    
    public string $_ = 'auth.importBotAuthorization';
    
    public function getMethodName(): string
    {
        return 'auth.importBotAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param int $flags
     * @param int $apiId
     * @param string $apiHash
     * @param string $botAuthToken
     */
    public function __construct(
        public readonly int $flags,
        public readonly int $apiId,
        public readonly string $apiHash,
        public readonly string $botAuthToken
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->flags);
        $buffer .= $serializer->int32($this->apiId);
        $buffer .= $serializer->bytes($this->apiHash);
        $buffer .= $serializer->bytes($this->botAuthToken);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}