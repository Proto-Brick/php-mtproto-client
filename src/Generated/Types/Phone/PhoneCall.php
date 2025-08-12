<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phone.phoneCall
 */
final class PhoneCall extends TlObject
{
    public const CONSTRUCTOR_ID = 0xec82e140;
    
    public string $predicate = 'phone.phoneCall';
    
    /**
     * @param AbstractPhoneCall $phoneCall
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AbstractPhoneCall $phoneCall,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->phoneCall->serialize();
        $buffer .= Serializer::vectorOfObjects($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $phoneCall = AbstractPhoneCall::deserialize($stream);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $phoneCall,
            $users
        );
    }
}