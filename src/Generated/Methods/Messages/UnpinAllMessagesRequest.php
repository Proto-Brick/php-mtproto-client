<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedHistory;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.unpinAllMessages
 */
final class UnpinAllMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xee22b9a8;
    
    public string $predicate = 'messages.unpinAllMessages';
    
    public function getMethodName(): string
    {
        return 'messages.unpinAllMessages';
    }
    
    public function getResponseClass(): string
    {
        return AffectedHistory::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}