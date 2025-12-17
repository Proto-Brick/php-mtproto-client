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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $phoneCallId = Deserializer::int64($__payload, $__offset);
        $data = Deserializer::bytes($__payload, $__offset);

        return new self(
            $phoneCallId,
            $data
        );
    }
}