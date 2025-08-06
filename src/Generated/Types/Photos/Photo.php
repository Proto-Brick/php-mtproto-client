<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Photos;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/photos.photo
 */
final class Photo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x20212ca8;
    
    public string $_ = 'photos.photo';
    
    /**
     * @param AbstractPhoto $photo
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AbstractPhoto $photo,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->photo->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $photo = AbstractPhoto::deserialize($deserializer, $stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $photo,
            $users
        );
    }
}