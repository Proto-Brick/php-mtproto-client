<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/requestedPeerChannel
 */
final class RequestedPeerChannel extends AbstractRequestedPeer
{
    public const CONSTRUCTOR_ID = 2342781924;
    
    public string $_ = 'requestedPeerChannel';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->username !== null) $flags |= (1 << 1);
        if ($this->photo !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->username);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $channelId = $deserializer->int64($stream);
        $title = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $username = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $photo = ($flags & (1 << 2)) ? AbstractPhoto::deserialize($deserializer, $stream) : null;
            return new self(
            $channelId,
            $title,
            $username,
            $photo
        );
    }
}