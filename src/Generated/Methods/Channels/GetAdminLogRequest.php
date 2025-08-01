<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChannelAdminLogEventsFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Channels\AbstractAdminLogResults;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getAdminLog
 */
final class GetAdminLogRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 870184064;
    
    public string $_ = 'channels.getAdminLog';
    
    public function getMethodName(): string
    {
        return 'channels.getAdminLog';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAdminLogResults::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param string $q
     * @param int $maxId
     * @param int $minId
     * @param int $limit
     * @param AbstractChannelAdminLogEventsFilter|null $eventsFilter
     * @param list<AbstractInputUser>|null $admins
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly string $q,
        public readonly int $maxId,
        public readonly int $minId,
        public readonly int $limit,
        public readonly ?AbstractChannelAdminLogEventsFilter $eventsFilter = null,
        public readonly ?array $admins = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->eventsFilter !== null) $flags |= (1 << 0);
        if ($this->admins !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->bytes($this->q);
        if ($flags & (1 << 0)) {
            $buffer .= $this->eventsFilter->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->admins);
        }
        $buffer .= $serializer->int64($this->maxId);
        $buffer .= $serializer->int64($this->minId);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}