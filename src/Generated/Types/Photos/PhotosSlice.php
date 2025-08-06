<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Photos;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/photos.photosSlice
 */
final class PhotosSlice extends AbstractPhotos
{
    public const CONSTRUCTOR_ID = 0x15051f54;
    
    public string $_ = 'photos.photosSlice';
    
    /**
     * @param int $count
     * @param list<AbstractPhoto> $photos
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $count,
        public readonly array $photos,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->photos);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $count = $deserializer->int32($stream);
        $photos = $deserializer->vectorOfObjects($stream, [AbstractPhoto::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $count,
            $photos,
            $users
        );
    }
}