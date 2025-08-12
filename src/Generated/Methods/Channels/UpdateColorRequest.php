<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.updateColor
 */
final class UpdateColorRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd8aa3671;
    
    public string $predicate = 'channels.updateColor';
    
    public function getMethodName(): string
    {
        return 'channels.updateColor';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param true|null $forProfile
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly ?true $forProfile = null,
        public readonly ?int $color = null,
        public readonly ?int $backgroundEmojiId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forProfile) $flags |= (1 << 1);
        if ($this->color !== null) $flags |= (1 << 2);
        if ($this->backgroundEmojiId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->color);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->backgroundEmojiId);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}