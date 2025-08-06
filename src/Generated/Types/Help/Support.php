<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.support
 */
final class Support extends TlObject
{
    public const CONSTRUCTOR_ID = 0x17c6b5f6;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $phoneNumber = $deserializer->bytes($stream);
        $user = AbstractUser::deserialize($deserializer, $stream);
        return new self(
            $phoneNumber,
            $user
        );
    }
}