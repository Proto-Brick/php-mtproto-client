<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDialogUnreadMark
 */
final class UpdateDialogUnreadMark extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xe16459c3;
    
    public string $predicate = 'updateDialogUnreadMark';
    
    /**
     * @param AbstractDialogPeer $peer
     * @param true|null $unread
     */
    public function __construct(
        public readonly AbstractDialogPeer $peer,
        public readonly ?true $unread = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unread) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $unread = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractDialogPeer::deserialize($stream);

        return new self(
            $peer,
            $unread
        );
    }
}