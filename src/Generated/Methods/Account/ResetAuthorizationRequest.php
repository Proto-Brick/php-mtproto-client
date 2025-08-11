<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.resetAuthorization
 */
final class ResetAuthorizationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdf77f3bc;
    
    public string $_ = 'account.resetAuthorization';
    
    public function getMethodName(): string
    {
        return 'account.resetAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}