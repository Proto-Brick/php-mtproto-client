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
    
    public string $predicate = 'photos.photosSlice';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->photos);
        $buffer .= Serializer::vectorOfObjects($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $count = Deserializer::int32($stream);
        $photos = Deserializer::vectorOfObjects($stream, [AbstractPhoto::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $photos,
            $users
        );
    }
}