<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftAttributeOriginalDetails
 */
final class StarGiftAttributeOriginalDetails extends AbstractStarGiftAttribute
{
    public const CONSTRUCTOR_ID = 0xe0bff26c;
    
    public string $predicate = 'starGiftAttributeOriginalDetails';
    
    /**
     * @param AbstractPeer $recipientId
     * @param int $date
     * @param AbstractPeer|null $senderId
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly AbstractPeer $recipientId,
        public readonly int $date,
        public readonly ?AbstractPeer $senderId = null,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->senderId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->message !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->senderId->serialize();
        }
        $buffer .= $this->recipientId->serialize();
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $senderId = (($flags & (1 << 0)) !== 0) ? AbstractPeer::deserialize($stream) : null;
        $recipientId = AbstractPeer::deserialize($stream);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $message = (($flags & (1 << 1)) !== 0) ? TextWithEntities::deserialize($stream) : null;

        return new self(
            $recipientId,
            $date,
            $senderId,
            $message
        );
    }
}