<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateNewEncryptedMessage
 */
final class UpdateNewEncryptedMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x12bcbd9a;
    
    public string $predicate = 'updateNewEncryptedMessage';
    
    /**
     * @param AbstractEncryptedMessage $message
     * @param int $qts
     */
    public function __construct(
        public readonly AbstractEncryptedMessage $message,
        public readonly int $qts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->message->serialize();
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $message = AbstractEncryptedMessage::deserialize($__payload, $__offset);
        $qts = Deserializer::int32($__payload, $__offset);

        return new self(
            $message,
            $qts
        );
    }
}