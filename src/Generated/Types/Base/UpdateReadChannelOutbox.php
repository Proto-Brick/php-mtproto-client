<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateReadChannelOutbox
 */
final class UpdateReadChannelOutbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb75f99a9;
    
    public string $predicate = 'updateReadChannelOutbox';
    
    /**
     * @param int $channelId
     * @param int $maxId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $channelId = Deserializer::int64($stream);
        $maxId = Deserializer::int32($stream);

        return new self(
            $channelId,
            $maxId
        );
    }
}