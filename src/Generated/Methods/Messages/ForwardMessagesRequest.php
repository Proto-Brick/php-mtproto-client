<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputQuickReplyShortcut;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.forwardMessages
 */
final class ForwardMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd5039208;
    
    public string $predicate = 'messages.forwardMessages';
    
    public function getMethodName(): string
    {
        return 'messages.forwardMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $fromPeer
     * @param list<int> $id
     * @param list<int> $randomId
     * @param AbstractInputPeer $toPeer
     * @param true|null $silent
     * @param true|null $background
     * @param true|null $withMyScore
     * @param true|null $dropAuthor
     * @param true|null $dropMediaCaptions
     * @param true|null $noforwards
     * @param true|null $allowPaidFloodskip
     * @param int|null $topMsgId
     * @param int|null $scheduleDate
     * @param AbstractInputPeer|null $sendAs
     * @param AbstractInputQuickReplyShortcut|null $quickReplyShortcut
     */
    public function __construct(
        public readonly AbstractInputPeer $fromPeer,
        public readonly array $id,
        public readonly array $randomId,
        public readonly AbstractInputPeer $toPeer,
        public readonly ?true $silent = null,
        public readonly ?true $background = null,
        public readonly ?true $withMyScore = null,
        public readonly ?true $dropAuthor = null,
        public readonly ?true $dropMediaCaptions = null,
        public readonly ?true $noforwards = null,
        public readonly ?true $allowPaidFloodskip = null,
        public readonly ?int $topMsgId = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?AbstractInputPeer $sendAs = null,
        public readonly ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) $flags |= (1 << 5);
        if ($this->background) $flags |= (1 << 6);
        if ($this->withMyScore) $flags |= (1 << 8);
        if ($this->dropAuthor) $flags |= (1 << 11);
        if ($this->dropMediaCaptions) $flags |= (1 << 12);
        if ($this->noforwards) $flags |= (1 << 14);
        if ($this->allowPaidFloodskip) $flags |= (1 << 19);
        if ($this->topMsgId !== null) $flags |= (1 << 9);
        if ($this->scheduleDate !== null) $flags |= (1 << 10);
        if ($this->sendAs !== null) $flags |= (1 << 13);
        if ($this->quickReplyShortcut !== null) $flags |= (1 << 17);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->fromPeer->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        $buffer .= Serializer::vectorOfLongs($this->randomId);
        $buffer .= $this->toPeer->serialize();
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->sendAs->serialize();
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->quickReplyShortcut->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}