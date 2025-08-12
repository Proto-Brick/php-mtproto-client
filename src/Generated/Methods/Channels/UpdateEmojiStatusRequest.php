<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.updateEmojiStatus
 */
final class UpdateEmojiStatusRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf0d3e6a8;
    
    public string $predicate = 'channels.updateEmojiStatus';
    
    public function getMethodName(): string
    {
        return 'channels.updateEmojiStatus';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractEmojiStatus $emojiStatus
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractEmojiStatus $emojiStatus
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->emojiStatus->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}