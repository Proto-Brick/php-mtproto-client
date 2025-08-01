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
    public const CONSTRUCTOR_ID = 2730545012;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->password !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->reason);
        if ($flags & (1 << 0)) {
            $buffer .= $this->password->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}