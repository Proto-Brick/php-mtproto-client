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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $message = AbstractEncryptedMessage::deserialize($stream);
        $qts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $message,
            $qts
        );
    }
}