<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.reorderPinnedForumTopics
 */
final class ReorderPinnedForumTopicsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2950a18f;
    
    public string $predicate = 'channels.reorderPinnedForumTopics';
    
    public function getMethodName(): string
    {
        return 'channels.reorderPinnedForumTopics';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<int> $order
     * @param true|null $force
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $order,
        public readonly ?true $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->force) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::vectorOfInts($this->order);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}