<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPeerPhotoFileLocation
 */
final class InputPeerPhotoFileLocation extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0x37257e99;
    
    public string $_ = 'inputPeerPhotoFileLocation';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $photoId
     * @param bool|null $big
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $photoId,
        public readonly ?bool $big = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->big) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int64($this->photoId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $big = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractInputPeer::deserialize($deserializer, $stream);
        $photoId = $deserializer->int64($stream);
        return new self(
            $peer,
            $photoId,
            $big
        );
    }
}