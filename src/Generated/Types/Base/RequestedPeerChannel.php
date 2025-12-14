<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/requestedPeerChannel
 */
final class RequestedPeerChannel extends AbstractRequestedPeer
{
    public const CONSTRUCTOR_ID = 0x8ba403e4;
    
    public string $predicate = 'requestedPeerChannel';
    
    /**
     * @param int $channelId
     * @param string|null $title
     * @param string|null $username
     * @param AbstractPhoto|null $photo
     */
    public function __construct(
        public readonly int $channelId,
        public readonly ?string $title = null,
        public readonly ?string $username = null,
        public readonly ?AbstractPhoto $photo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        if ($this->username !== null) {
            $flags |= (1 << 1);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->username);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $channelId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $title = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $username = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $photo = (($flags & (1 << 2)) !== 0) ? AbstractPhoto::deserialize($stream) : null;

        return new self(
            $channelId,
            $title,
            $username,
            $photo
        );
    }
}