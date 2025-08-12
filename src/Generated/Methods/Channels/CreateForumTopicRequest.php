<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.createForumTopic
 */
final class CreateForumTopicRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf40c0224;
    
    public string $predicate = 'channels.createForumTopic';
    
    public function getMethodName(): string
    {
        return 'channels.createForumTopic';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param string $title
     * @param int $randomId
     * @param int|null $iconColor
     * @param int|null $iconEmojiId
     * @param AbstractInputPeer|null $sendAs
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly string $title,
        public readonly int $randomId,
        public readonly ?int $iconColor = null,
        public readonly ?int $iconEmojiId = null,
        public readonly ?AbstractInputPeer $sendAs = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->iconColor !== null) $flags |= (1 << 0);
        if ($this->iconEmojiId !== null) $flags |= (1 << 3);
        if ($this->sendAs !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->iconColor);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int64($this->iconEmojiId);
        }
        $buffer .= Serializer::int64($this->randomId);
        if ($flags & (1 << 2)) {
            $buffer .= $this->sendAs->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}