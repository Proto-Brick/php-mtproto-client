<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AccountDaysTTL;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.setAccountTTL
 */
final class SetAccountTTLRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2442485e;
    
    public string $_ = 'account.setAccountTTL';
    
    public function getMethodName(): string
    {
        return 'account.setAccountTTL';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AccountDaysTTL $ttl
     */
    public function __construct(
        public readonly AccountDaysTTL $ttl
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->ttl->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}