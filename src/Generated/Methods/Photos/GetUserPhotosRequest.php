<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Photos;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Photos\AbstractPhotos;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/photos.getUserPhotos
 */
final class GetUserPhotosRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x91cd32a8;
    
    public string $predicate = 'photos.getUserPhotos';
    
    public function getMethodName(): string
    {
        return 'photos.getUserPhotos';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPhotos::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $offset
     * @param int $maxId
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $offset,
        public readonly int $maxId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int64($this->maxId);
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}