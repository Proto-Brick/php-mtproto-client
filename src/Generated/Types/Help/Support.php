<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.support
 */
final class Support extends AbstractSupport
{
    public const CONSTRUCTOR_ID = 398898678;
    
    public string $_ = 'help.support';
    
    /**
     * @param string $phoneNumber
     * @param AbstractUser $user
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly AbstractUser $user
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $this->user->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $phoneNumber = $deserializer->bytes($stream);
        $user = AbstractUser::deserialize($deserializer, $stream);
            return new self(
            $phoneNumber,
            $user
        );
    }
}