<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/encryptedMessage
 */
final class EncryptedMessage extends AbstractEncryptedMessage
{
    public const CONSTRUCTOR_ID = 0xed18c118;
    
    public string $predicate = 'encryptedMessage';
    
    /**
     * @param int $randomId
     * @param int $chatId
     * @param int $date
     * @param string $bytes
     * @param AbstractEncryptedFile $file
     */
    public function __construct(
        public readonly int $randomId,
        public readonly int $chatId,
        public readonly int $date,
        public readonly string $bytes,
        public readonly AbstractEncryptedFile $file
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::int32($this->chatId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->bytes);
        $buffer .= $this->file->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $randomId = Deserializer::int64($__payload, $__offset);
        $chatId = Deserializer::int32($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $bytes = Deserializer::bytes($__payload, $__offset);
        $file = AbstractEncryptedFile::deserialize($__payload, $__offset);

        return new self(
            $randomId,
            $chatId,
            $date,
            $bytes,
            $file
        );
    }
}