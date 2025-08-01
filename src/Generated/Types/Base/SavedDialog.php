<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/savedDialog
 */
final class SavedDialog extends AbstractSavedDialog
{
    public const CONSTRUCTOR_ID = 3179793260;
    
    public string $_ = 'savedDialog';
    
    /**
     * @param AbstractPeer $peer
     * @param int $topMessage
     * @param bool|null $pinned
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $topMessage,
        public readonly ?bool $pinned = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->topMessage);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pinned = ($flags & (1 << 2)) ? true : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $topMessage = $deserializer->int32($stream);
            return new self(
            $peer,
            $topMessage,
            $pinned
        );
    }
}