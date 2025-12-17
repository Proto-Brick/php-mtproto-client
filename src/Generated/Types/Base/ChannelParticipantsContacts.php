<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelParticipantsContacts
 */
final class ChannelParticipantsContacts extends AbstractChannelParticipantsFilter
{
    public const CONSTRUCTOR_ID = 0xbb6ae88d;
    
    public string $predicate = 'channelParticipantsContacts';
    
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
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $q = Deserializer::bytes($__payload, $__offset);

        return new self(
            $q
        );
    }
}