<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelParticipantsKicked
 */
final class ChannelParticipantsKicked extends AbstractChannelParticipantsFilter
{
    public const CONSTRUCTOR_ID = 0xa3b54985;
    
    public string $predicate = 'channelParticipantsKicked';
    
    /**
     * @param string $q
     */
    public function __construct(
        public readonly string $q
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->q);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $q = Deserializer::bytes($__payload, $__offset);

        return new self(
            $q
        );
    }
}