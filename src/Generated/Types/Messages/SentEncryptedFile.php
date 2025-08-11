<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEncryptedFile;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.sentEncryptedFile
 */
final class SentEncryptedFile extends AbstractSentEncryptedMessage
{
    public const CONSTRUCTOR_ID = 0x9493ff32;
    
    public string $_ = 'messages.sentEncryptedFile';
    
    /**
     * @param int $date
     * @param AbstractEncryptedFile $file
     */
    public function __construct(
        public readonly int $date,
        public readonly AbstractEncryptedFile $file
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->file->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $date = Deserializer::int32($stream);
        $file = AbstractEncryptedFile::deserialize($stream);
        return new self(
            $date,
            $file
        );
    }
}