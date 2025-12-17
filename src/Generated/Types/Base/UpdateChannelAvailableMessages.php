<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannelAvailableMessages
 */
final class UpdateChannelAvailableMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb23fc698;
    
    public string $predicate = 'updateChannelAvailableMessages';
    
    /**
     * @param int $channelId
     * @param int $availableMinId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $availableMinId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->availableMinId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $channelId = Deserializer::int64($__payload, $__offset);
        $availableMinId = Deserializer::int32($__payload, $__offset);

        return new self(
            $channelId,
            $availableMinId
        );
    }
}