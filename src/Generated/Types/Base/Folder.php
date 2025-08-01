<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/folder
 */
final class Folder extends AbstractFolder
{
    public const CONSTRUCTOR_ID = 4283715173;
    
    public string $_ = 'folder';
    
    /**
     * @param int $id
     * @param string $title
     * @param bool|null $autofillNewBroadcasts
     * @param bool|null $autofillPublicGroups
     * @param bool|null $autofillNewCorrespondents
     * @param AbstractChatPhoto|null $photo
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly ?bool $autofillNewBroadcasts = null,
        public readonly ?bool $autofillPublicGroups = null,
        public readonly ?bool $autofillNewCorrespondents = null,
        public readonly ?AbstractChatPhoto $photo = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->autofillNewBroadcasts) $flags |= (1 << 0);
        if ($this->autofillPublicGroups) $flags |= (1 << 1);
        if ($this->autofillNewCorrespondents) $flags |= (1 << 2);
        if ($this->photo !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->bytes($this->title);
        if ($flags & (1 << 3)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $autofillNewBroadcasts = ($flags & (1 << 0)) ? true : null;
        $autofillPublicGroups = ($flags & (1 << 1)) ? true : null;
        $autofillNewCorrespondents = ($flags & (1 << 2)) ? true : null;
        $id = $deserializer->int32($stream);
        $title = $deserializer->bytes($stream);
        $photo = ($flags & (1 << 3)) ? AbstractChatPhoto::deserialize($deserializer, $stream) : null;
            return new self(
            $id,
            $title,
            $autofillNewBroadcasts,
            $autofillPublicGroups,
            $autofillNewCorrespondents,
            $photo
        );
    }
}