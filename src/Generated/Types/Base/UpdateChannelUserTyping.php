<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelUserTyping
 */
final class UpdateChannelUserTyping extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8c88c923;
    
    public string $_ = 'updateChannelUserTyping';
    
    /**
     * @param int $channelId
     * @param AbstractPeer $fromId
     * @param AbstractSendMessageAction $action
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly AbstractPeer $fromId,
        public readonly AbstractSendMessageAction $action,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        $buffer .= $this->fromId->serialize();
        $buffer .= $this->action->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $channelId = Deserializer::int64($stream);
        $topMsgId = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $fromId = AbstractPeer::deserialize($stream);
        $action = AbstractSendMessageAction::deserialize($stream);
        return new self(
            $channelId,
            $fromId,
            $action,
            $topMsgId
        );
    }
}