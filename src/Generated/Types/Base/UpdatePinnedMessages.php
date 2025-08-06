<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePinnedMessages
 */
final class UpdatePinnedMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xed85eab5;
    
    public string $_ = 'updatePinnedMessages';
    
    /**
     * @param AbstractPeer $peer
     * @param list<int> $messages
     * @param int $pts
     * @param int $ptsCount
     * @param bool|null $pinned
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly array $messages,
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly ?bool $pinned = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->messages);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pinned = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $messages = $deserializer->vectorOfInts($stream);
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
        return new self(
            $peer,
            $messages,
            $pts,
            $ptsCount,
            $pinned
        );
    }
}