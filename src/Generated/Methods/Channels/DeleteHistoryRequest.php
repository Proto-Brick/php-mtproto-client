<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.deleteHistory
 */
final class DeleteHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9baa9647;
    
    public string $_ = 'channels.deleteHistory';
    
    public function getMethodName(): string
    {
        return 'channels.deleteHistory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $maxId
     * @param bool|null $forEveryone
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $maxId,
        public readonly ?bool $forEveryone = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forEveryone) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}