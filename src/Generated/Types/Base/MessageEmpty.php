<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageEmpty
 */
final class MessageEmpty extends AbstractMessage
{
    public const CONSTRUCTOR_ID = 2426849924;
    
    public string $_ = 'messageEmpty';
    
    /**
     * @param int $id
     * @param AbstractPeer|null $peerId
     */
    public function __construct(
        public readonly int $id,
        public readonly ?AbstractPeer $peerId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peerId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->peerId->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $id = $deserializer->int32($stream);
        $peerId = ($flags & (1 << 0)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
            return new self(
            $id,
            $peerId
        );
    }
}