<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractLoginToken;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.exportLoginToken
 */
final class ExportLoginTokenRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3084944894;
    
    public string $_ = 'auth.exportLoginToken';
    
    public function getMethodName(): string
    {
        return 'auth.exportLoginToken';
    }
    
    public function getResponseClass(): string
    {
        return AbstractLoginToken::class;
    }
    /**
     * @param int $apiId
     * @param string $apiHash
     * @param list<int> $exceptIds
     */
    public function __construct(
        public readonly int $apiId,
        public readonly string $apiHash,
        public readonly array $exceptIds
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->apiId);
        $buffer .= $serializer->bytes($this->apiHash);
        $buffer .= $serializer->vectorOfLongs($this->exceptIds);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}