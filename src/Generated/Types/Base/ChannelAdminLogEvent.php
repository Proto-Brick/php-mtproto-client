<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEvent
 */
final class ChannelAdminLogEvent extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1fad68cd;
    
    public string $_ = 'channelAdminLogEvent';
    
    /**
     * @param int $id
     * @param int $date
     * @param int $userId
     * @param AbstractChannelAdminLogEventAction $action
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
        public readonly int $userId,
        public readonly AbstractChannelAdminLogEventAction $action
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $this->action->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $id = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $userId = $deserializer->int64($stream);
        $action = AbstractChannelAdminLogEventAction::deserialize($deserializer, $stream);
        return new self(
            $id,
            $date,
            $userId,
            $action
        );
    }
}