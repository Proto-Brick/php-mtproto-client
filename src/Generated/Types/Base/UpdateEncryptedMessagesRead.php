<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateEncryptedMessagesRead
 */
final class UpdateEncryptedMessagesRead extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x38fe25b7;
    
    public string $predicate = 'updateEncryptedMessagesRead';
    
    /**
     * @param int $chatId
     * @param int $maxDate
     * @param int $date
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $maxDate,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->chatId);
        $buffer .= Serializer::int32($this->maxDate);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $chatId = Deserializer::int32($stream);
        $maxDate = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $chatId,
            $maxDate,
            $date
        );
    }
}