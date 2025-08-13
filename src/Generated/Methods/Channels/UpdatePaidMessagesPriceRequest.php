<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.updatePaidMessagesPrice
 */
final class UpdatePaidMessagesPriceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4b12327b;
    
    public string $predicate = 'channels.updatePaidMessagesPrice';
    
    public function getMethodName(): string
    {
        return 'channels.updatePaidMessagesPrice';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $sendPaidMessagesStars
     * @param true|null $broadcastMessagesAllowed
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $sendPaidMessagesStars,
        public readonly ?true $broadcastMessagesAllowed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcastMessagesAllowed) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int64($this->sendPaidMessagesStars);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}