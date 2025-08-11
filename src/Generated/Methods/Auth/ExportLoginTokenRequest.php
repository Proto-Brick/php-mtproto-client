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
    public const CONSTRUCTOR_ID = 0xb7e085fe;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->apiId);
        $buffer .= Serializer::bytes($this->apiHash);
        $buffer .= Serializer::vectorOfLongs($this->exceptIds);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}