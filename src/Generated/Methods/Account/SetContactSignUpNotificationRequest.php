<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.setContactSignUpNotification
 */
final class SetContactSignUpNotificationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcff43f61;
    
    public string $_ = 'account.setContactSignUpNotification';
    
    public function getMethodName(): string
    {
        return 'account.setContactSignUpNotification';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool $silent
     */
    public function __construct(
        public readonly bool $silent
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->silent ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}