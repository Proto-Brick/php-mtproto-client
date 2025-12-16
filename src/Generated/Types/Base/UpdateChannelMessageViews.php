<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannelMessageViews
 */
final class UpdateChannelMessageViews extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf226ac08;
    
    public string $predicate = 'updateChannelMessageViews';
    
    /**
     * @param int $channelId
     * @param int $id
     * @param int $views
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $id,
        public readonly int $views
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int32($this->views);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $channelId = Deserializer::int64($stream);
        $id = Deserializer::int32($stream);
        $views = Deserializer::int32($stream);

        return new self(
            $channelId,
            $id,
            $views
        );
    }
}