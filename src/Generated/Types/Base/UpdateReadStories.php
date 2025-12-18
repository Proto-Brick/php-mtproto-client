<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateReadStories
 */
final class UpdateReadStories extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf74e932b;
    
    public string $predicate = 'updateReadStories';
    
    /**
     * @param AbstractPeer $peer
     * @param int $maxId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $maxId = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $maxId
        );
    }
}