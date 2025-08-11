<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractResetPasswordResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.resetPassword
 */
final class ResetPasswordRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9308ce1b;
    
    public string $_ = 'account.resetPassword';
    
    public function getMethodName(): string
    {
        return 'account.resetPassword';
    }
    
    public function getResponseClass(): string
    {
        return AbstractResetPasswordResult::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}