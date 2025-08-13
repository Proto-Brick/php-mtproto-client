<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/requestedPeerChat
 */
final class RequestedPeerChat extends AbstractRequestedPeer
{
    public const CONSTRUCTOR_ID = 0x7307544f;
    
    public string $predicate = 'requestedPeerChat';
    
    /**
     * @param int $chatId
     * @param string|null $title
     * @param AbstractPhoto|null $photo
     */
    public function __construct(
        public readonly int $chatId,
        public readonly ?string $title = null,
        public readonly ?AbstractPhoto $photo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->chatId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $chatId = Deserializer::int64($stream);
        $title = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $photo = (($flags & (1 << 2)) !== 0) ? AbstractPhoto::deserialize($stream) : null;

        return new self(
            $chatId,
            $title,
            $photo
        );
    }
}