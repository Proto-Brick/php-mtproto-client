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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $channelId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $availableMinId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $channelId,
            $availableMinId
        );
    }
}