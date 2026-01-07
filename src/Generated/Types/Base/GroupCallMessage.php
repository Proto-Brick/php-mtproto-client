<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/groupCallMessage
 */
final class GroupCallMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1a8afc7e;
    
    public string $predicate = 'groupCallMessage';
    
    /**
     * @param int $id
     * @param AbstractPeer $fromId
     * @param int $date
     * @param TextWithEntities $message
     * @param true|null $fromAdmin
     * @param int|null $paidMessageStars
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractPeer $fromId,
        public readonly int $date,
        public readonly TextWithEntities $message,
        public readonly ?true $fromAdmin = null,
        public readonly ?int $paidMessageStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fromAdmin) {
            $flags |= (1 << 1);
        }
        if ($this->paidMessageStars !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->fromId->serialize();
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->message->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->paidMessageStars);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $fromAdmin = (($flags & (1 << 1)) !== 0) ? true : null;
        $id = Deserializer::int32($__payload, $__offset);
        $fromId = AbstractPeer::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $message = TextWithEntities::deserialize($__payload, $__offset);
        $paidMessageStars = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

        return new self(
            $id,
            $fromId,
            $date,
            $message,
            $fromAdmin,
            $paidMessageStars
        );
    }
}