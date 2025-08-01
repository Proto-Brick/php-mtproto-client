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
    public const CONSTRUCTOR_ID = 2492727090;
    
    public string $_ = 'messages.sentEncryptedFile';
    
    /**
     * @param int $date
     * @param AbstractEncryptedFile $file
     */
    public function __construct(
        public readonly int $date,
        public readonly AbstractEncryptedFile $file
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $this->file->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $date = $deserializer->int32($stream);
        $file = AbstractEncryptedFile::deserialize($deserializer, $stream);
            return new self(
            $date,
            $file
        );
    }
}