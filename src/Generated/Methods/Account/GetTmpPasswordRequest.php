<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractTmpPassword;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getTmpPassword
 */
final class GetTmpPasswordRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1151208273;
    
    public string $_ = 'account.getTmpPassword';
    
    public function getMethodName(): string
    {
        return 'account.getTmpPassword';
    }
    
    public function getResponseClass(): string
    {
        return AbstractTmpPassword::class;
    }
    /**
     * @param AbstractInputCheckPasswordSRP $password
     * @param int $period
     */
    public function __construct(
        public readonly AbstractInputCheckPasswordSRP $password,
        public readonly int $period
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->password->serialize($serializer);
        $buffer .= $serializer->int32($this->period);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}