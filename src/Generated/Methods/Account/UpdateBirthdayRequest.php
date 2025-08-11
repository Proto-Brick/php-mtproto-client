<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\Birthday;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateBirthday
 */
final class UpdateBirthdayRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcc6e0c11;
    
    public string $_ = 'account.updateBirthday';
    
    public function getMethodName(): string
    {
        return 'account.updateBirthday';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param Birthday|null $birthday
     */
    public function __construct(
        public readonly ?Birthday $birthday = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->birthday !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->birthday->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}