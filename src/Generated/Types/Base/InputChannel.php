<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputChannel
 */
final class InputChannel extends AbstractInputChannel
{
    public const CONSTRUCTOR_ID = 0xf35aec28;
    
    public string $predicate = 'inputChannel';
    
    /**
     * @param int $channelId
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int64($this->accessHash);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $channelId = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);

        return new self(
            $channelId,
            $accessHash
        );
    }
}