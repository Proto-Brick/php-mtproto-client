<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputSavedStarGiftChat
 */
final class InputSavedStarGiftChat extends AbstractInputSavedStarGift
{
    public const CONSTRUCTOR_ID = 0xf101aa7f;
    
    public string $predicate = 'inputSavedStarGiftChat';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $savedId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $savedId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->savedId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractInputPeer::deserialize($__payload, $__offset);
        $savedId = Deserializer::int64($__payload, $__offset);

        return new self(
            $peer,
            $savedId
        );
    }
}