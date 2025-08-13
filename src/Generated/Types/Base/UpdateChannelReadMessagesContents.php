<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelReadMessagesContents
 */
final class UpdateChannelReadMessagesContents extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x25f324f7;
    
    public string $predicate = 'updateChannelReadMessagesContents';
    
    /**
     * @param int $channelId
     * @param list<int> $messages
     * @param int|null $topMsgId
     * @param AbstractPeer|null $savedPeerId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly array $messages,
        public readonly ?int $topMsgId = null,
        public readonly ?AbstractPeer $savedPeerId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        if ($this->savedPeerId !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        $buffer .= Serializer::vectorOfInts($this->messages);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $channelId = Deserializer::int64($stream);
        $topMsgId = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $savedPeerId = ($flags & (1 << 1)) ? AbstractPeer::deserialize($stream) : null;
        $messages = Deserializer::vectorOfInts($stream);

        return new self(
            $channelId,
            $messages,
            $topMsgId,
            $savedPeerId
        );
    }
}