<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDialogPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.markDialogUnread
 */
final class MarkDialogUnreadRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc286d98f;
    
    public string $predicate = 'messages.markDialogUnread';
    
    public function getMethodName(): string
    {
        return 'messages.markDialogUnread';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputDialogPeer $peer
     * @param true|null $unread
     */
    public function __construct(
        public readonly AbstractInputDialogPeer $peer,
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
        throw new \LogicException('Request objects are not deserializable');
    }
}