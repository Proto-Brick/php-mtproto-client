<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.editForumTopic
 */
final class EditForumTopicRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 4108296581;
    
    public string $_ = 'channels.editForumTopic';
    
    public function getMethodName(): string
    {
        return 'channels.editForumTopic';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $topicId
     * @param string|null $title
     * @param int|null $iconEmojiId
     * @param bool|null $closed
     * @param bool|null $hidden
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $topicId,
        public readonly ?string $title = null,
        public readonly ?int $iconEmojiId = null,
        public readonly ?bool $closed = null,
        public readonly ?bool $hidden = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->iconEmojiId !== null) $flags |= (1 << 1);
        if ($this->closed !== null) $flags |= (1 << 2);
        if ($this->hidden !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->int32($this->topicId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int64($this->iconEmojiId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->closed ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 3)) {
            $buffer .= ($this->hidden ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}