<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.confirmPasswordEmail
 */
final class ConfirmPasswordEmailRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8fdf1920;
    
    public string $_ = 'account.confirmPasswordEmail';
    
    public function getMethodName(): string
    {
        return 'account.confirmPasswordEmail';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $code
     */
    public function __construct(
        public readonly string $code
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->code);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}