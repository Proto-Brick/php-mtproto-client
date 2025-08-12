<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputEncryptedFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedChat;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSentEncryptedMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendEncryptedFile
 */
final class SendEncryptedFileRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5559481d;
    
    public string $predicate = 'messages.sendEncryptedFile';
    
    public function getMethodName(): string
    {
        return 'messages.sendEncryptedFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentEncryptedMessage::class;
    }
    /**
     * @param InputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     * @param AbstractInputEncryptedFile $file
     * @param true|null $silent
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly int $randomId,
        public readonly string $data,
        public readonly AbstractInputEncryptedFile $file,
        public readonly ?true $silent = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::bytes($this->data);
        $buffer .= $this->file->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}