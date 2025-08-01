<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageMedia;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.uploadImportedMedia
 */
final class UploadImportedMediaRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 713433234;
    
    public string $_ = 'messages.uploadImportedMedia';
    
    public function getMethodName(): string
    {
        return 'messages.uploadImportedMedia';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessageMedia::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $importId
     * @param string $fileName
     * @param AbstractInputMedia $media
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $importId,
        public readonly string $fileName,
        public readonly AbstractInputMedia $media
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int64($this->importId);
        $buffer .= $serializer->bytes($this->fileName);
        $buffer .= $this->media->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}