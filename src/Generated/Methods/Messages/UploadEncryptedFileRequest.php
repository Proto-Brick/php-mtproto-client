<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputEncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedChat;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.uploadEncryptedFile
 */
final class UploadEncryptedFileRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5057c497;
    
    public string $_ = 'messages.uploadEncryptedFile';
    
    public function getMethodName(): string
    {
        return 'messages.uploadEncryptedFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEncryptedFile::class;
    }
    /**
     * @param InputEncryptedChat $peer
     * @param AbstractInputEncryptedFile $file
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly AbstractInputEncryptedFile $file
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->file->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}