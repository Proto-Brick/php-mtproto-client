<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/requestedPeerChat
 */
final class RequestedPeerChat extends AbstractRequestedPeer
{
    public const CONSTRUCTOR_ID = 1929860175;
    
    public string $_ = 'requestedPeerChat';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->photo !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->chatId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->title);
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

        $chatId = $deserializer->int64($stream);
        $title = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $photo = ($flags & (1 << 2)) ? AbstractPhoto::deserialize($deserializer, $stream) : null;
            return new self(
            $chatId,
            $title,
            $photo
        );
    }
}