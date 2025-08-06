<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.invalidateSignInCodes
 */
final class InvalidateSignInCodesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xca8ae8ba;
    
    public string $_ = 'account.invalidateSignInCodes';
    
    public function getMethodName(): string
    {
        return 'account.invalidateSignInCodes';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<string> $codes
     */
    public function __construct(
        public readonly array $codes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfStrings($this->codes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}