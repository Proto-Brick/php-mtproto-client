<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputEncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputEncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSentEncryptedMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendEncryptedFile
 */
final class SendEncryptedFileRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1431914525;
    
    public string $_ = 'messages.sendEncryptedFile';
    
    public function getMethodName(): string
    {
        return 'messages.sendEncryptedFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentEncryptedMessage::class;
    }
    /**
     * @param AbstractInputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     * @param AbstractInputEncryptedFile $file
     * @param bool|null $silent
     */
    public function __construct(
        public readonly AbstractInputEncryptedChat $peer,
        public readonly int $randomId,
        public readonly string $data,
        public readonly AbstractInputEncryptedFile $file,
        public readonly ?bool $silent = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int64($this->randomId);
        $buffer .= $serializer->bytes($this->data);
        $buffer .= $this->file->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}