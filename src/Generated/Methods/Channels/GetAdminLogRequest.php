<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelAdminLogEventsFilter;
use DigitalStars\MtprotoClient\Generated\Types\Channels\AdminLogResults;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getAdminLog
 */
final class GetAdminLogRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x33ddf480;
    
    public string $predicate = 'channels.getAdminLog';
    
    public function getMethodName(): string
    {
        return 'channels.getAdminLog';
    }
    
    public function getResponseClass(): string
    {
        return AdminLogResults::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param string $q
     * @param int $maxId
     * @param int $minId
     * @param int $limit
     * @param ChannelAdminLogEventsFilter|null $eventsFilter
     * @param list<AbstractInputUser>|null $admins
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly string $q,
        public readonly int $maxId,
        public readonly int $minId,
        public readonly int $limit,
        public readonly ?ChannelAdminLogEventsFilter $eventsFilter = null,
        public readonly ?array $admins = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->eventsFilter !== null) $flags |= (1 << 0);
        if ($this->admins !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::bytes($this->q);
        if ($flags & (1 << 0)) {
            $buffer .= $this->eventsFilter->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->admins);
        }
        $buffer .= Serializer::int64($this->maxId);
        $buffer .= Serializer::int64($this->minId);
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}