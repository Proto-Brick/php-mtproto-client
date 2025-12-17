<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateEditMessage
 */
final class UpdateEditMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xe40370a3;
    
    public string $predicate = 'updateEditMessage';
    
    /**
     * @param AbstractMessage $message
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly AbstractMessage $message,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->message->serialize();
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $message = AbstractMessage::deserialize($__payload, $__offset);
        $pts = Deserializer::int32($__payload, $__offset);
        $ptsCount = Deserializer::int32($__payload, $__offset);

        return new self(
            $message,
            $pts,
            $ptsCount
        );
    }
}