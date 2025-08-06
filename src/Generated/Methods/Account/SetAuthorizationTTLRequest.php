<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.setAuthorizationTTL
 */
final class SetAuthorizationTTLRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbf899aa0;
    
    public string $_ = 'account.setAuthorizationTTL';
    
    public function getMethodName(): string
    {
        return 'account.setAuthorizationTTL';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $authorizationTtlDays
     */
    public function __construct(
        public readonly int $authorizationTtlDays
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->authorizationTtlDays);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}