<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelMessageForwards
 */
final class UpdateChannelMessageForwards extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd29a27f4;
    
    public string $_ = 'updateChannelMessageForwards';
    
    /**
     * @param int $channelId
     * @param int $id
     * @param int $forwards
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $id,
        public readonly int $forwards
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int32($this->forwards);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $channelId = Deserializer::int64($stream);
        $id = Deserializer::int32($stream);
        $forwards = Deserializer::int32($stream);
        return new self(
            $channelId,
            $id,
            $forwards
        );
    }
}