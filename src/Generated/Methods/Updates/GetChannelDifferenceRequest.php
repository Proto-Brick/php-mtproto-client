<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Updates;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChannelMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Updates\AbstractChannelDifference;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/updates.getChannelDifference
 */
final class GetChannelDifferenceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3173d78;
    
    public string $_ = 'updates.getChannelDifference';
    
    public function getMethodName(): string
    {
        return 'updates.getChannelDifference';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChannelDifference::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractChannelMessagesFilter $filter
     * @param int $pts
     * @param int $limit
     * @param bool|null $force
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractChannelMessagesFilter $filter,
        public readonly int $pts,
        public readonly int $limit,
        public readonly ?bool $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->force) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->channel->serialize();
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}