<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateMessageExtendedMedia
 */
final class UpdateMessageExtendedMedia extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd5a41724;
    
    public string $predicate = 'updateMessageExtendedMedia';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param list<AbstractMessageExtendedMedia> $extendedMedia
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly array $extendedMedia
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::vectorOfObjects($this->extendedMedia);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $msgId = Deserializer::int32($__payload, $__offset);
        $extendedMedia = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageExtendedMedia::class, 'deserialize']);

        return new self(
            $peer,
            $msgId,
            $extendedMedia
        );
    }
}