<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractSentCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\CodeSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.sendConfirmPhoneCode
 */
final class SendConfirmPhoneCodeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1b3faa88;
    
    public string $_ = 'account.sendConfirmPhoneCode';
    
    public function getMethodName(): string
    {
        return 'account.sendConfirmPhoneCode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentCode::class;
    }
    /**
     * @param string $hash
     * @param CodeSettings $settings
     */
    public function __construct(
        public readonly string $hash,
        public readonly CodeSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->hash);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}