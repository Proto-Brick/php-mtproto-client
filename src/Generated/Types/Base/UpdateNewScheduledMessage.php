<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateNewScheduledMessage
 */
final class UpdateNewScheduledMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x39a51dfb;
    
    public string $predicate = 'updateNewScheduledMessage';
    
    /**
     * @param AbstractMessage $message
     */
    public function __construct(
        public readonly AbstractMessage $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->message->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $message = AbstractMessage::deserialize($stream);

        return new self(
            $message
        );
    }
}