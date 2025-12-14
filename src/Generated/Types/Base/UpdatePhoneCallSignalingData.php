<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePhoneCallSignalingData
 */
final class UpdatePhoneCallSignalingData extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2661bf09;
    
    public string $predicate = 'updatePhoneCallSignalingData';
    
    /**
     * @param int $phoneCallId
     * @param string $data
     */
    public function __construct(
        public readonly int $phoneCallId,
        public readonly string $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->phoneCallId);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $phoneCallId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $data = Deserializer::bytes($stream);

        return new self(
            $phoneCallId,
            $data
        );
    }
}