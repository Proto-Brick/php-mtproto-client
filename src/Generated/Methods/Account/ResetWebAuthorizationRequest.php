<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.resetWebAuthorization
 */
final class ResetWebAuthorizationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2d01b9ef;
    
    public string $predicate = 'account.resetWebAuthorization';
    
    public function getMethodName(): string
    {
        return 'account.resetWebAuthorization';
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