<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputBusinessChatLink
 */
final class InputBusinessChatLink extends TlObject
{
    public const CONSTRUCTOR_ID = 0x11679fa7;
    
    public string $predicate = 'inputBusinessChatLink';
    
    /**
     * @param string $message
     * @param list<AbstractMessageEntity>|null $entities
     * @param string|null $title
     */
    public function __construct(
        public readonly string $message,
        public readonly ?array $entities = null,
        public readonly ?string $title = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) {
            $flags |= (1 << 0);
        }
        if ($this->title !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->title);
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
        $message = Deserializer::bytes($__payload, $__offset);
        $entities = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']) : null;
        $title = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $message,
            $entities,
            $title
        );
    }
}