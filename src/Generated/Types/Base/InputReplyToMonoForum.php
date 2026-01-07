<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputReplyToMonoForum
 */
final class InputReplyToMonoForum extends AbstractInputReplyTo
{
    public const CONSTRUCTOR_ID = 0x69d66c45;
    
    public string $predicate = 'inputReplyToMonoForum';
    
    /**
     * @param AbstractInputPeer $monoforumPeerId
     */
    public function __construct(
        public readonly AbstractInputPeer $monoforumPeerId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->monoforumPeerId->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $monoforumPeerId = AbstractInputPeer::deserialize($__payload, $__offset);

        return new self(
            $monoforumPeerId
        );
    }
}