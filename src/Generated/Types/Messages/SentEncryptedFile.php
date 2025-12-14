<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEncryptedFile;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.sentEncryptedFile
 */
final class SentEncryptedFile extends AbstractSentEncryptedMessage
{
    public const CONSTRUCTOR_ID = 0x9493ff32;
    
    public string $predicate = 'messages.sentEncryptedFile';
    
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
        Deserializer::int32($stream); // Constructor ID
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $file = AbstractEncryptedFile::deserialize($stream);

        return new self(
            $date,
            $file
        );
    }
}