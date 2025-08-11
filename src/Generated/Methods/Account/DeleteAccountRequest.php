<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.deleteAccount
 */
final class DeleteAccountRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa2c0cf74;
    
    public string $_ = 'account.deleteAccount';
    
    public function getMethodName(): string
    {
        return 'account.deleteAccount';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $reason
     * @param AbstractInputCheckPasswordSRP|null $password
     */
    public function __construct(
        public readonly string $reason,
        public readonly ?AbstractInputCheckPasswordSRP $password = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->password !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->reason);
        if ($flags & (1 << 0)) {
            $buffer .= $this->password->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}