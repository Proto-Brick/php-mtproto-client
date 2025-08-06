<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateProfile
 */
final class UpdateProfileRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x78515775;
    
    public string $_ = 'account.updateProfile';
    
    public function getMethodName(): string
    {
        return 'account.updateProfile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUser::class;
    }
    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $about
     */
    public function __construct(
        public readonly ?string $firstName = null,
        public readonly ?string $lastName = null,
        public readonly ?string $about = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->firstName !== null) $flags |= (1 << 0);
        if ($this->lastName !== null) $flags |= (1 << 1);
        if ($this->about !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->firstName);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->lastName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->about);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}