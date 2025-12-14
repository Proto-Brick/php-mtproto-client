<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/encryptedMessageService
 */
final class EncryptedMessageService extends AbstractEncryptedMessage
{
    public const CONSTRUCTOR_ID = 0x23734b06;
    
    public string $predicate = 'encryptedMessageService';
    
    /**
     * @param int $randomId
     * @param int $chatId
     * @param int $date
     * @param string $bytes
     */
    public function __construct(
        public readonly int $randomId,
        public readonly int $chatId,
        public readonly int $date,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::int32($this->chatId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $randomId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $chatId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $bytes = Deserializer::bytes($stream);

        return new self(
            $randomId,
            $chatId,
            $date,
            $bytes
        );
    }
}