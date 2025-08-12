<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Photos;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Photos\Photo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/photos.updateProfilePhoto
 */
final class UpdateProfilePhotoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9e82039;
    
    public string $predicate = 'photos.updateProfilePhoto';
    
    public function getMethodName(): string
    {
        return 'photos.updateProfilePhoto';
    }
    
    public function getResponseClass(): string
    {
        return Photo::class;
    }
    /**
     * @param AbstractInputPhoto $id
     * @param true|null $fallback
     * @param AbstractInputUser|null $bot
     */
    public function __construct(
        public readonly AbstractInputPhoto $id,
        public readonly ?true $fallback = null,
        public readonly ?AbstractInputUser $bot = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fallback) $flags |= (1 << 0);
        if ($this->bot !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->bot->serialize();
        }
        $buffer .= $this->id->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}