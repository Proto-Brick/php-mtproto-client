<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.sentEncryptedMessage
 */
final class SentEncryptedMessage extends AbstractSentEncryptedMessage
{
    public const CONSTRUCTOR_ID = 0x560f8935;
    
    public string $predicate = 'messages.sentEncryptedMessage';
    
    /**
     * @param int $date
     */
    public function __construct(
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $date = Deserializer::int32($__payload, $__offset);

        return new self(
            $date
        );
    }
}