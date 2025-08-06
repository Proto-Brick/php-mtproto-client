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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->topMsgId);
        }
        $buffer .= $this->fromId->serialize($serializer);
        $buffer .= $this->action->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $channelId = $deserializer->int64($stream);
        $topMsgId = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $fromId = AbstractPeer::deserialize($deserializer, $stream);
        $action = AbstractSendMessageAction::deserialize($deserializer, $stream);
        return new self(
            $channelId,
            $fromId,
            $action,
            $topMsgId
        );
    }
}